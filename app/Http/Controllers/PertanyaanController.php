<?php

namespace App\Http\Controllers;

use App\Mail\PeriodMail;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\Catatan;
use App\Models\Jawaban;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PertanyaanController extends Controller
{

    public function index($slug)
    {
        $peralatan = Peralatan::where('slug', '=', $slug)->first();
        $pertanyaan = Jawaban::join('pertanyaans', 'pertanyaans.id', 'jawabans.id_pertanyaan')
                        ->where('jawabans.id_peralatan', '=', $peralatan->id)
                        ->get(['jawabans.*', 'pertanyaans.komponen', 'pertanyaans.kondisi', 'pertanyaans.regulasi', 'pertanyaans.nama_peralatan']);
        $catatan = Catatan::where('id_peralatan', '=', $peralatan->id)->first();
        if ($peralatan->style == 'deactive') {
            return redirect()->route('inspeksi')->with('error', 'Mohon Minta Admin Untuk Mengaktifkan Formnya');
        } else {
            return view('formInspeksi', compact('peralatan', 'pertanyaan', 'catatan'));
        }
        // dd($peralatan);
    }

    public function store(Request $request)
    {
        $inputDate = Carbon::parse($request->periode);

        $endDate = $inputDate->copy()->addMonths(3)->startOfDay();

        $peralatan = Peralatan::findOrFail($request->id_peralatan);
        $peralatan->update([
            'style' => 'deactive',
            'periode' => $inputDate,
            'periode_akhir' => $endDate,
            'merk' => $request->merk,
            'pdf_status' => 1,
            'mechanic_sign' => null,
            'safety_sign' => null,
        ]);

        // $email["email"] = 'destacya@gmail.com';
        // andhynehru@gmail.com
        // destacya@gmail.com
        // $email["title"] = 'Peringatan Jatuh Tempo Inspeksi Peralatan Mekanik';
        // $email["peralatan"] = $peralatan->nama;
        // $email["identitas"] = $peralatan->identitas;
        // $subject = 'humuu';

        // if($endDate->isToday()) {
        //     Mail::send('emails.mail', $email, function($message)use($email) {
        //         $message->to($email["email"], $email["email"])
        //                 ->subject($email["title"]);
        //     });
        // }
        // if ($endDate->subDays(3)) {
        //     Mail::send('emails.mail2', $email, function($message)use($email) {
        //         $message->to($email["email"], $email["email"])
        //                 ->subject($email["title"]);
        //     });
        // }

        foreach($request->input('id') as $pertanyaan => $value) {
            if($request->hasFile("images.{$pertanyaan}")){
                // Generate a unique filename
                $file = $request->file("images.{$pertanyaan}");
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                // Save the file in the public/images directory
                $path = $file->move('upload', $filename);
            }
            $update = Jawaban::findOrFail($value);
            $update->update([
                'jawaban' => $request->input('opsi')[$pertanyaan] ?? null,
                'keterangan' => $request->input('name')[$pertanyaan] ?? null,
                'images' => $path,
            ]);
        }

        $catatan = Catatan::findOrFail($request->id_catatan);
        $catatan->update([
            'catatan' => $request->catatan
        ]);

        // $cek_gambar = Image::where('id_peralatan', '=', $request->id_peralatan)->first();

        // if($cek_gambar == null) {
        //     if ($request->hasFile('images')) {
        //         $images = [];
        //         foreach ($request->file('images') as $image) {
        //             $name = time() . '_' . $image->getClientOriginalName(); // Menggunakan nama unik
        //             $image->move('upload', $name); // Menyimpan gambar
        //             $images[] = 'upload/' . $name; // Menyimpan path gambar ke dalam array
        //             Image::create([
        //                 'image' => 'upload/'.$name,
        //                 'id_peralatan' => $peralatan->id,
        //             ]);
        //         }
        //     }
        // }

        $layak = true;
        foreach ($request->input('opsi') as $p => $jawaban) {
            if ($jawaban !== 'ya') {
                $layak = false;
                break;
            }
        }

        if ($layak) {
            foreach ($request->input('name') as $p => $keterangan) {
                $peralatan->update([
                    'keterangan' => 0
                ]);
            }
        } else {
            foreach ($request->input('name') as $p => $keterangan) {
                $peralatan->update([
                    'keterangan' => 1
                ]);
            }
        }

        return redirect()->route('inspeksi')->with('success', 'Inspeksi Berhasil');
    }

    public function searchData(Request $request) {
        $searchTerm = $request->input('search');

        // Search your model using the search term
        $cari = Peralatan::where('nama', 'like', '%' . $searchTerm . '%')
                            ->get();

        // Return the search results view
        return view('inspeksi_result', compact('cari'));
    }

    public function signGenerator($slug) {
        $peralatan = Peralatan::where('slug', '=', $slug)->firstOrFail();

        if (Auth::user()->role == 'safety' && $peralatan->safety_sign !== null || Auth::user()->role == 'mekanik' &&  $peralatan->mechanic_sign !== null) {
            return redirect()->route('inspeksi')->with('error', 'Anda Sudah Menanda Tangani Dokumen');
        }

        if ($peralatan->pdf_status == 0) {
            return redirect()->route('inspeksi')->with('error', 'Mohon Selesaikan Inspeksi Terlebih Dahulu');
        } else {
            return view('signGenerator', compact('peralatan'));
        }

        // dd($peralatan);
    }

    public function saveSign($slug) {
        $user = Auth::user();

        if ($user->sign == null) {
            return Redirect::route('profile')->with('error', 'Mohon Upload Tanda Tangan Terlabih Dahulu');
        }

        $peralatan = Peralatan::where('slug', $slug)->firstOrFail();
        $updateData = [];

        if ($user->role == 'safety') {
            if ($peralatan->safety_sign !== null) {
                return redirect()->route('inspeksi')->with('error', 'Dokumen Telah Tervalidasi');
            }
            $updateData['safety_sign'] = $user->id;
        } elseif ($user->role == 'mekanik') {
            if ($peralatan->mechanic_sign !== null) {
                return redirect()->route('inspeksi')->with('error', 'Dokumen Telah Tervalidasi');
            }
            $updateData['mechanic_sign'] = $user->id;
        }

        if ($peralatan->update($updateData)) {
            return redirect()->route('inspeksi')->with('success', 'Dokumen Berhasil Divalidasi');
        }

        return redirect()->route('inspeksi')->with('error', 'Dokumen Gagal Divalidasi');
    }

    public function inspeksi() {
        $peralatan = Peralatan::all();
        return view('inspeksi', compact('peralatan'));
    }
}

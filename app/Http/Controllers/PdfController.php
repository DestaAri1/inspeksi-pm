<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use App\Models\Peralatan;
use App\Models\Jawaban;
use App\Models\Catatan;
use App\Models\Image;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function viewPdf($slug) {
        $peralatan = Peralatan::with([
            'jawabans.pertanyaan', // Eager load related pertanyaan via jawabans
            'catatan', // Eager load related catatan
            'images', // Eager load related images
            'safety', // Eager load safety user
            'mekanik' // Eager load mechanic user
        ])->where('slug', $slug)->firstOrFail();

        if (is_null($peralatan->keterangan)) {
            return redirect()->back()->with('error', 'Inspeksi Belum Diselesaikan');
        }

        return view('pdf.index_2', compact('peralatan'));
    }

    public function pdfDownload($slug) {
        // Ambil data dari model
        $peralatan = Peralatan::where('slug', '=', $slug)->first();
        $pertanyaan = Jawaban::join('pertanyaans', 'pertanyaans.id', 'jawabans.id_pertanyaan')
                    ->where('jawabans.id_peralatan', '=', $peralatan->id)
                    ->get(['jawabans.*', 'pertanyaans.komponen', 'pertanyaans.kondisi', 'pertanyaans.regulasi', 'pertanyaans.nama_peralatan']);
        $catatan = Catatan::where('id_peralatan', '=', $peralatan->id)->first();
        $image = Image::where('id_peralatan', '=', $peralatan->id)->get();
        $safety = User::where('id', '=', $peralatan->safety_sign)
                        ->where('role', '=', 'safety')->first();
        $mekanik = User::where('id', '=', $peralatan->mechanic_sign)
                        ->where('role', '=', 'mekanik')->first();

        $date_asli = $peralatan->periode;

        $formattedDate = date('d-m-Y', strtotime($date_asli));

        // Render view Blade dengan data
        $html = view('pdf.index', compact('peralatan', 'pertanyaan', 'catatan', 'image', 'formattedDate', 'safety', 'mekanik'))->render();

        // Buat objek Dompdf
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream($slug);
    }
}

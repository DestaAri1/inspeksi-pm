<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;

class ProfileController extends Controller
{
    public function home() {
        $peralatan = [
            'Gerinda Tangan Listrik' => Peralatan::where('nama', '=', 'Gerinda Tangan Listrik')->get(),
            'Mesin Bor Listrik' => Peralatan::where('nama', '=', 'Mesin Bor Listrik')->get(),
            'Travo Las Listrik' => Peralatan::where('nama', '=', 'Travo Las Listrik')->get(),
            'Mesin Bar Bender' => Peralatan::where('nama', '=', 'Mesin Bar Bender')->get(),
            'Mesin Bar Cutter' => Peralatan::where('nama', '=', 'Mesin Bar Cutter')->get(),
            'Gergaji Mesin Lingkaran' => Peralatan::where('nama', '=', 'Gergaji Mesin Lingkaran')->get(),
            'Mesin JackHammer' => Peralatan::where('nama', '=', 'Mesin JackHammer')->get(),
        ];

        $data = [];

        foreach ($peralatan as $nama => $query) {
            $layak = $query->where('keterangan', '=', '0')->count();
            $tidakLayak = $query->where('keterangan', '=', '1')->count();
            $belumInspeksi = $query->where('keterangan', '=', null)->count();

            $total = $layak + $tidakLayak + $belumInspeksi;

            $layakPersen = ($total === 0) ? 0 : round($layak / $total * 100);
            $tidakPersen = ($total === 0) ? 0 : round($tidakLayak / $total * 100);
            $belumPersen = ($total === 0) ? 0 : round($belumInspeksi / $total * 100);

            $data[$nama] = [
                'nama' => $nama,
                'layak' => $layak,
                'tidak_layak' => $tidakLayak,
                'belum_inspeksi' => $belumInspeksi,
                'layak_persen' => $layakPersen,
                'tidak_persen' => $tidakPersen,
                'belum_persen' => $belumPersen
            ];
        }

        return view('index', compact('data'));
    }

    public function index() {
        return view('profile.index');
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'password' => 'nullable|string|min:8',
        ], [
            'password.nullable' => 'Kolom Password Dapat Dikosongi',
            'password.string' => 'Password Harus Berupa String',
            'password.min' => 'Password Minimal 8 Karakter',
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
            ->withErrors($validator)
            ->withInput();
        }

        $user = User::findOrFail($id);
        $user->update([
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        if ($user) {
            return Redirect::back()->with('success', 'Profile Berhasil Diupdate');
        } else {
            return Redirect::back()->with('error', 'Profile Gagal Diupdate');
        }
    }

    public function uplaodTTD(Request $request, $id) {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048',
        ], [
            'image.required' => 'Kolom Gambar Harus Diisi',
            'image.image' => 'Kolom Gambar Harus Berupa Image',
            'image.mimes' => 'Gambar yang Dimasukkan Harus Berformat .jpg, .png, ,jpeg',
            'image.max' => 'Ukuran Gambar Maksimal 2 MB',
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous())
            ->withErrors($validator)
            ->withInput();
        }

        $image = $request->file('image');

        if (Auth::user()->role == 'safety') {
            $name = 'safety';
        }

        if (Auth::user()->role == 'mekanik') {
            $name = 'mekanik';
        }
        $imageName = 'signature' . '_' . $name . '_' . time() . '.' . $image->getClientOriginalExtension();

        $image->move('signatures', $imageName);

        $update = $user->update([
            'sign' => $imageName
        ]);

        if ($update) {
            return redirect()->back()->with('success', 'Tanda Tangan Berhasil Diupload');
        } else {
            return redirect()->back()->with('error', 'Tanda Tangan Gagal Diupload');
        }
    }

    public function panduan() {
        return view('panduan');
    }
}

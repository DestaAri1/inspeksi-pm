<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class MainController extends Controller
{
    public function active(Request $request, $id){
        if(Auth::user()->role != 'admin') {
            return redirect()->route('inspeksi');
        }

        $peralatan = Peralatan::findOrFail($id);

        if ($request->status == 'active') {
            $peralatan->update(['style' => 'none']);

            $images = Image::where('id_peralatan', $id)->get();
            foreach ($images as $image) {
                $imagePath = public_path($image->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $image->delete();
            }
            $pesan = 'Form Inpeksi Berhasil Diaktifkan';
        } else if ($request->status == 'deactive') {
            $peralatan->update(['style' => 'deactive']);
            $pesan = 'Form Inpeksi Berhasil Di Non-Aktifkan';
        } else {
            return redirect()->route('inspeksi');
        }

        return redirect()->route('inspeksi')->with('success', $pesan);
    }
}

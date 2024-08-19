<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Peralatan;
use App\Models\pertanyaan;
use App\Models\Catatan;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;

class PeralatanController extends Controller
{
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     ''
        // ]);

        // if ($validator->fails()) {
        //     return redirect(url()->previous())
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $peralatan = Peralatan::firstOrCreate([
            'nama' => $request->nama,
            'slug' => SlugService::createSlug(Peralatan::class, 'slug', $request->nama),
            'rangka' => $request->rangka,
            'identitas' => $request->identitas
        ]);

        $getId = $peralatan->id;

        Catatan::create([
            'id_peralatan' => $getId
        ]);

        $cekNama = pertanyaan::where('nama_peralatan', '=', $request->nama)->get();
        foreach ($cekNama as $jawaban=>$value) {
            Jawaban::create([
                'id_pertanyaan' => $value->id,
                'id_peralatan' => $getId
            ]);
        }

        return redirect()->back()->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $peralatan = Peralatan::findOrFail($id);
        if ($peralatan->delete()) {
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}

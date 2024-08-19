<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $data = User::where('role', '!=', 'admin')->get();
        return view('user.user', compact('data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:8',
            'role' => 'string'
        ], [
            'name.required' => 'Kolom Nama Harus Diisi',
            'name.string' => 'Kolom Nama Harus Berupa String',
            'name.max' => 'Kolom Nama Maksimal 255 Karakter',
            'email.required' => 'Kolom Email Harus Diisi',
            'email.string' => 'Kolom Email Harus Berupa String',
            'email.email' => 'Kolom Email Harus Berupa Email',
            'email.max'=> 'Kolom Email Maksimal 255 Karakter',
            'email.unique' => 'Email Sudah Terdaftar',
            'password.nullable' => 'Kolom Password Dapat Dikosongi',
            'password.string' => 'Password Harus Berupa String',
            'password.min' => 'Password Minimal 8 Karakter',
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        if ($user) {
            return redirect()->route('user')->with('success', $user->name . ' Berhasil Dibuat');
        } else {
            return redirect()->route('user')->with('error', 'Gagal Untuk Membuat User');
        }
    }

    public function show($id) {
        $data = User::findOrFail($id);
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'password' => 'nullable|string|min:8',
            'role' => 'required|string'
        ], [
            'password.nullable' => 'Kolom Password Dapat Dikosongi',
            'password.string' => 'Password Harus Berupa String',
            'password.min' => 'Password Minimal 8 Karakter',
            'role.required' => 'Kolom Role Harus Diisi',
            'role.string' => 'Kolom Role Harus Berupa String'
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
            ->withErrors($validator)
            ->withInput();
        }

        $user = User::findOrFail($id);

        $update = $user->update([
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        if ($update) {
            return redirect()->route('user')->with('success', 'User Berhasil Diupdate');
        } else {
            return redirect()->route('user')->with('error', 'User Gagal Diupdate');
        }
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return redirect()->route('user')->with('success', 'User Berhasil Dihapus');
        } else {
            return redirect()->route('user')->with('error', 'User Gagal Dihapus');
        }
    }

    public function search(Request $request) {
        $input = $request->input('search');

        $search = User::where('role', '!=', 'admin')
                        ->where(function($query) use ($input) {
                            $query->where('name', 'like', '%' . $input . '%')
                                ->orWhere('email', 'like', '%' . $input . '%')
                                ->orWhere('role', 'like', '%' . $input . '%');
                        })
                        ->get();

        return view('user.user_result', compact('search'));
    }
}

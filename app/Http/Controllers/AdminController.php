<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan daftar admin (Read)
    public function index() {
        $admin = Admin::all();
        return view('admin.index', ['admin' => $admin]);
    }

    // Menampilkan form tambah admin (Create)
    public function create() {
        return view('admin.create');
    }

    // Menyimpan admin baru (Store)
    public function store(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required',
            'nama_admin' => 'required',
            'no_telepon' => 'required',
            'password' => 'required',
        ]);

        $validatedData['username'] = strip_tags($validatedData['username']);
        $validatedData['nama_admin'] = strip_tags($validatedData['nama_admin']);
        $validatedData['no_telepon'] = strip_tags($validatedData['no_telepon']);
        $validatedData['password'] = bcrypt($validatedData['password']); // Password di-enkripsi

        Admin::create($validatedData);

        return redirect()->route('admin.index');
    }

    // Menampilkan form edit admin (Edit)
    public function edit(Admin $admin) {
        return view('admin.edit', ['admin' => $admin]);
    }

    // Mengupdate admin (Update)
    public function update(Request $request, Admin $admin) {
        $validatedData = $request->validate([
            'username' => 'required',
            'nama_admin' => 'required',
            'no_telepon' => 'required',
            'password' => 'required',
        ]);

        $validatedData['username'] = strip_tags($validatedData['username']);
        $validatedData['nama_admin'] = strip_tags($validatedData['nama_admin']);
        $validatedData['no_telepon'] = strip_tags($validatedData['no_telepon']);
        $validatedData['password'] = bcrypt($validatedData['password']); // Password di-enkripsi

        $admin->update($validatedData);

        return redirect()->route('admin.index');
    }

    // Menghapus admin (Delete)
    public function destroy(Admin $admin) {
        $admin->delete();
        return redirect()->route('admin.index');
    }
}

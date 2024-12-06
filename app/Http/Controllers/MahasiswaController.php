<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'email' => 'required|email|unique:mahasiswa',
            'alamat_tinggal' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('public/foto_mahasiswa');
        }

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_tinggal' => $request->alamat_tinggal,
            'foto' => $foto,
        ]);

        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat_tinggal' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $foto = $mahasiswa->foto; 
        if ($request->hasFile('foto')) {
            if ($foto) {
                Storage::delete($foto);
            }
            $foto = $request->file('foto')->store('public/foto_mahasiswa');
        }

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_tinggal' => $request->alamat_tinggal,
            'foto' => $foto,
        ]);

        return redirect()->route('mahasiswa.index');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        if ($mahasiswa->foto) {
            Storage::delete($mahasiswa->foto);
        }
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index');
    }
}

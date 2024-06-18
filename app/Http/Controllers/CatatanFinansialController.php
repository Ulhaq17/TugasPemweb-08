<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatatanFinansial;
use Illuminate\Support\Facades\Storage;

class CatatanFinansialController extends Controller
{
    public function index() {
        $catatanFinansial = CatatanFinansial::all();
        return view('catatanfinansial', compact('catatanFinansial'));
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'tipe_transaksi' => 'required|string',
            'kategori_transaksi' => 'required|string',
            'nominal_transaksi' => 'required|integer',
            'deskripsi_transaksi' => 'required|string|max:30',
            'file_transaksi' => 'nullable|mimes:jpg,png,pdf|max:2048',
        ]);

        $catatanFinansial = new CatatanFinansial();
        $catatanFinansial->tanggal_transaksi = $request->tanggal_transaksi;
        $catatanFinansial->tipe_transaksi = $request->tipe_transaksi;
        $catatanFinansial->kategori_transaksi = $request->kategori_transaksi;
        $catatanFinansial->nominal_transaksi = $request->nominal_transaksi;
        $catatanFinansial->deskripsi_transaksi = $request->deskripsi_transaksi;

        if ($request->hasFile('file_transaksi')) {
            $file = $request->file('file_transaksi');
            $filePath = $file->store('uploads', 'public');
            $catatanFinansial->file_path = $filePath;
        }

        $catatanFinansial->save();

        return redirect()->route('catatanFinansial.index');
    }

    public function destroy($id) {
        $catatanFinansial = CatatanFinansial::findOrFail($id);
        if ($catatanFinansial->file_path) {
            Storage::disk('public')->delete($catatanFinansial->file_path);
        }
        $catatanFinansial->delete();

        return redirect()->route('catatanFinansial.index');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'tipe_transaksi' => 'required|string',
            'kategori_transaksi' => 'required|string',
            'nominal_transaksi' => 'required|integer',
            'deskripsi_transaksi' => 'required|string|max:30',
            'file_transaksi' => 'nullable|mimes:jpg,png,pdf|max:2048',
        ]);

        $catatanFinansial = CatatanFinansial::findOrFail($id);
        $catatanFinansial->tanggal_transaksi = $request->tanggal_transaksi;
        $catatanFinansial->tipe_transaksi = $request->tipe_transaksi;
        $catatanFinansial->kategori_transaksi = $request->kategori_transaksi;
        $catatanFinansial->nominal_transaksi = $request->nominal_transaksi;
        $catatanFinansial->deskripsi_transaksi = $request->deskripsi_transaksi;

        if ($request->hasFile('file_transaksi')) {
            if ($catatanFinansial->file_path) {
                Storage::disk('public')->delete($catatanFinansial->file_path);
            }
            $file = $request->file('file_transaksi');
            $filePath = $file->store('uploads', 'public');
            $catatanFinansial->file_path = $filePath;
        }

        $catatanFinansial->save();

        return redirect()->route('catatanFinansial.index');
    }
}
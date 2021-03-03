<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Pinjam;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjam = Pinjam::all()->toArray();
        return $pinjam;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $pinjam = Pinjam::create([
            'id_siswa' => $request->id_siswa,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        if($pinjam) {
            return response()->json(['status' => 1]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }

    public function show($id)
    {
        $pinjam = Pinjam::find($id);
        return response()->json($pinjam);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $pinjam = Pinjam::find($id);
        $pinjam->update($request->all());

        if($pinjam) {
            return response()->json(['status' => 1]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $pinjam = Pinjam::find($id);
        $pinjam->delete();

        if($pinjam) {
            return response()->json(['status' => 1]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }
}

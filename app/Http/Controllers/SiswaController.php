<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = DB::table('siswa')
                     ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id')
                     ->select('siswa.*', 'kelas.nama_kelas')
                     ->get();
        return $siswa;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'nama_siswa' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'id_kelas' => 'required'
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        } 

        $siswa = Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'id_kelas' => $request->id_kelas
        ]);

        if($siswa) {
            return response()->json(['status' => 1]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }

    public function show($id)
    {
        // $siswa = Siswa::find($id);
        $siswa = DB::table('siswa')
                     ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id')
                     ->select('siswa.*', 'kelas.nama_kelas')
                     ->where('siswa.id', '=', $id)
                     ->get();
        return response()->json($siswa);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'nama_siswa' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'id_kelas' => 'required'
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $siswa = Siswa::find($id);
        $siswa->update($request->all());

        if($siswa) {
            return response()->json(['status' => 1]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        if($siswa) {
            return response()->json(['status' => 1]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }
}

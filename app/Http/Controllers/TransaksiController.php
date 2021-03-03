<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Kembali;
use App\Models\DetailPinjam;

use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function pinjam(Request $request)
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

    public function tambahDetail($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_buku' => 'required',
            'jumlah' => 'required'
        ]);

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $detail = DetailPinjam::create([
            'id_pinjam' => $id,
            'id_buku' => $request->id_buku,
            'jumlah' => $request->jumlah
        ]);

        if($detail) {
            return response()->json(['status' => 1]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }

    public function kembali(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pinjam' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $cek = Kembali::where('id_pinjam', $request->id_pinjam);

        if($cek->count() == 0) {
            $pinjam = Pinjam::where('id', $request->id_pinjam)->first();
            $tgl_sekarang = Carbon::now()->format('Y-m-d');
            $tgl_kembali = new Carbon($pinjam->tgl_kembali);

            $denda_per_hari = 1000;

            if(strtotime($tgl_sekarang) > strtotime($tgl_kembali)) {
                $jumlah_hari = $tgl_kembali->diff($tgl_sekarang)->days;
                $denda = $jumlah_hari * $denda_per_hari;
            }
            else {
                $denda = 0;
            }

            $kembali = Kembali::create([
                'id_pinjam' => $request->id_pinjam,
                'tgl_kembali' => $tgl_sekarang,
                'denda' => $denda
            ]);

            if($kembali) {
                return response()->json(['status' => 1 , 'pesan' => 'Berhasil kembali']);
            } 
            else {
                return response()->json(['status' => 0 , 'pesan' => 'Gagal kembali']);
            }
        }
        else {
            return response()->json(['status' => 0 , 'pesan' => 'Buku sudah kembali']);
        }
    }
}

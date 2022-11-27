<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return response()->json([
            'status' => '200',
            'message' => 'data succesfully sent',
            'data' => $transaksi
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = Transaksi::create([
            'nama_konser' => $request->nama_konser,
            'jenis_tiket' => $request->jenis_tiket,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $request->total_harga
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $transaksi
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        if($transaksi){
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil ditampilkan',
                'data' => $transaksi
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        if($transaksi){
            $transaksi->nama_konser = $request->nama_konser ? $request->nama_konser : $transaksi->nama_konser;
            $transaksi->jenis_tiket = $request->jenis_tiket ? $request->jenis_tiket : $transaksi->jenis_tiket;
            $transaksi->tanggal = $request->tanggal ? $request->tanggal : $transaksi->tanggal;
            $transaksi->waktu = $request->waktu ? $request->waktu : $transaksi->waktu;
            $transaksi->lokasi = $request->lokasi ? $request->lokasi : $transaksi->lokasi;
            $transaksi->jumlah_tiket = $request->jumlah_tiket ? $request->jumlah_tiket : $transaksi->jumlah_tiket;
            $transaksi->total_harga = $request->total_harga ? $request->total_harga : $transaksi->total_harga;
            $transaksi->save();
            return response()->json([
                'status' => 200,
                'data' => $transaksi
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $transaksi . 'tidak di temukan'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id',$id)->first();
        if($transaksi){
            $transaksi->delete();
            return response()->json([
                'status' => 200,
                'data' => $transaksi
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak di temukan'
            ],404);
        };
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = Tiket::all();
        return response()->json([
            'status' => '200',
            'message' => 'data succesfully sent',
            'data' => $tiket
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
        $tiket = Tiket::create([
            'nama_konser' => $request->nama_konser,
            'jenis_tiket' => $request->jenis_tiket,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $tiket
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
        $tiket = Tiket::find($id);
        if($tiket){
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil ditampilkan',
                'data' => $tiket
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
        $tiket = Tiket::find($id);
        if($tiket){
            $tiket->nama_konser = $request->nama_konser ? $request->nama_konser : $tiket->nama_konser;
            $tiket->jenis_tiket = $request->jenis_tiket ? $request->jenis_tiket : $tiket->jenis_tiket;
            $tiket->tanggal = $request->tanggal ? $request->tanggal : $tiket->tanggal;
            $tiket->waktu = $request->waktu ? $request->waktu : $tiket->waktu;
            $tiket->harga = $request->harga ? $request->harga : $tiket->harga;
            $tiket->stok = $request->stok ? $request->stok : $tiket->stok;
            $tiket->lokasi = $request->lokasi ? $request->lokasi : $tiket->lokasi;
            $tiket->save();
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $tiket . 'tidak di temukan'
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
        $tiket = Tiket::where('id',$id)->first();
        if($tiket){
            $tiket->delete();
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak di temukan'
            ],404);
        };
    }
}

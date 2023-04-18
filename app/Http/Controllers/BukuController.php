<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $buku = Buku::paginate(10);
            return response()-> json([
                'data' => $buku
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        $buku= Buku::find($req->id);
        $buku->judul=$req->judul;
        $buku->author=$req->author;
        $buku->deskripsi=$req->deskripsi;
        $buku->rating=$req->rating;
        $results = $buku->save();
        if($results)
        {
            return ["berhasil diupdate"];
        }
        else
        {
            return ["gak berhasil diupdate"];
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function add(Request $req)
    {
        $buku= new Buku;
        $buku->judul=$req->judul;
        $buku->author=$req->author;
        $buku->deskripsi=$req->deskripsi;
        $buku->rating=$req->rating;
        $results = $buku->save();
        if($results)
        {
            return ["berhasil"];
        }
        else
        {
            return ["gak berhasil"];
        }
    }

    public function HighScore()
    {

        $data = Buku::orderBy('rating','desc')->take(10)->get();
        
        return response()->json($data, status:200);

    }

    public function LowScore()
    {

        $data = Buku::orderBy('rating','asc')->take(10)->get();
        
        return response()->json($data, status:200);

    }

    public function GetbyId(string $id)
    {
        $data = Buku::where('id','=',$id)->get();

        return response()->json($data, status:200);
    }

    public function destroy(Buku $buku)
    {
        //
    }
}

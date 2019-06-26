<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategori;
use App\Tag;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $kategori = Kategori::orderBy('created_at','desc')->get();

        
        return view('backend.kategori.index', compact('kategori'));
        // dd($artikel);
        // if (count($kategori) <= 0)  {
        //     $response = [
        //         'success' => false,
        //         'data' => 'Empty',
        //         'message' =>'kategori Tidak ditemukan'
        //     ];
        //     return response()->json($response, 404);
        // }
        //  $response = [
        //         'success' => true,
        //         'data' => $kategori,
        //         'message' =>'berhasil'
        //     ];
        //     return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. tampung semua inputan ke $input
        $input = $request->all();

        //2. Buat Validasi ditampung ke $validator
        $validator = Validator::make($input, [
            'nama_kategori' => 'required|min:5'
        ]);
      
        //3. chek validasi
        if ($validator->fails()){
             $response = [
                'success' => false,
                'data' => 'Validator Eror',
                'message' =>'$validator->errors()'
            ];
            return response()->json($response, 200);
        }
        //4.buat fungsi untuk menghandle semua inputan -> dimasukkan ketable
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori,'-');
        $kategori->save();
        //5. menampilkan response
        // $response = [
        //         'success' => true,
        //         'data' => $kategori,
        //         'message' =>'kategori berhasil ditambahkan'
        //     ];
           // return response()->json($response, 200);
            return redirect()->route('kategori.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  $kategori = Kategori::findOrFail($id);
        // if (!$kategori) {
        //     $response = [
        //         'success' => false,
        //         'data' => 'Empty',
        //         'message' =>'kategori Tidak ditemukan'
        //     ];
        //     return response()->json($response, 404);
        // }
        //  $response = [
        //         'success' => true,
        //         'data' => $kategori,
        //         'message' =>'berhasil'
        //     ];
        //     return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $kategori = Kategori::findOrFail($id);
        return view('backend.kategori.edit',compact('kategori'));
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
         $kategori = Kategori::find($id);
         $input = $request->all();
        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'kategori Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }

         $validator = Validator::make($input, [
            'nama_kategori' => 'required|min:5'
        ]);
      
        if ($validator->fails()){
             $response = [
                'success' => false,
                'data' => 'Validator Eror',
                'message' =>'$validator->errors()'
            ];
            return response()->json($response, 500);
             return redirect()->route('kategori.index');
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori,'-');
        $kategori->save();
        // $response = [
        //         'success' => true,
        //         'data' => $kategori,
        //         'message' =>'kategori berhasil diupdate'
        //     ];
        //     return response()->json($response, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $kategori = Kategori::find($id);
          if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'kategori Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $kategori->delete();
        //  $response = [
        //         'success' => true,
        //         'data' => $kategori,
        //         'message' =>'kategori berhasil dihapus'
        //     ];
        //     return response()->json($response, 200);
             return redirect()->route('kategori.index');
    
    }
}
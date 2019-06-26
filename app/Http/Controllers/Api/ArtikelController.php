<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Tag;
use Auth;
use File;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $artikel = Artikel::orderBy('created_at','desc')->get();
        // dd($artikel);
        return view('backend.artikel.index', compact('artikel'));
        //   $artikel = Artikel::all();
        // if (count($artikel) <= 0)  {
        //     $response = [
        //         'success' => false,
        //         'data' => 'Empty',
        //         'message' =>'Artikel Tidak ditemukan'
        //     ];
        //     return response()->json($response, 404);
        // }
        //  $response = [
        //         'success' => true,
        //         'data' => $artikel,
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
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('backend.artikel.create', compact('kategori','tag'));
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
       // $input = $request->all();

        //2. Buat Validasi ditampung ke $validator
        // $validator = Validator::make($input, [
        //     'judul' => 'required|min:5',
        // ]);
      
        //3. chek validasi
        // if ($validator->fails()){
        //      $response = [
        //         'success' => false,
        //         'data' => 'Validator Eror',
        //         'message' =>'$validator->errors()'
        //     ];
        //     return response()->json($response, 200);
        // }
        //4.buat fungsi untuk menghandle semua inputan -> dimasukkan ketable

        $user = Auth::user()->id;
        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->konten = $request->konten;
        $artikel->slug =str_slug($request->judul,'-');
        $artikel->kategori_id = $request->kategori_id;
        $artikel->user_id = $user;
        // $artikel->publish = $request->publish;
        // upload foto
       if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $destinationPath = '/assets/img/artikel';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $artikel->foto = $filename;
        }



        dd($artikel);
        return redirect()->route('artikel.index');
        // //5. menampilkan response
        // $response = [
        //         'success' => true,
        //         'data' => $Artikel,
        //         'message' =>'artikel berhasil ditambahkan'
        //     ];
        //     return response()->json($response, 200);
           

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $artikel = Artikel::findOrFail($id);
        if (!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'Artikel Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
         $response = [
                'success' => true,
                'data' => $artikel,
                'message' =>'berhasil'
            ];
            return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('backend.artikel.',compact('artikel'));
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
        // $artikel = Artikel::find($id);
        //  $input = $request->all();
        // if (!$artikel) {
        //     $response = [
        //         'success' => false,
        //         'data' => 'Empty',
        //         'message' =>'Artikel Tidak ditemukan'
        //     ];
        //     return response()->json($response, 404);
        // }

        //  $validator = Validator::make($input, [
        //     'judul' => 'required|min:5'
        // ]);
      
        // if ($validator->fails()){
        //      $response = [
        //         'success' => false,
        //         'data' => 'Validator Eror',
        //         'message' =>'$validator->errors()'
        //     ];
        //     return response()->json($response, 500);
        // }

        $artikel = Artikel::findOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul, '-');
        $artikel->konten = $request->konten;
        $artikel->user_id = Auth::user()->id;
        $artikel->kategori_id = $request->kategori_id;
       
         # Foto
         if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path().'/assets/img/artikel/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $upload = $file->move($path, $filename);

            if($artikel->foto){
                $old_foto = $artikel->foto;
                $filepath = public_path().'/assets/img/artikel/'.$artikel->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    //Exception $e;
                }
            }
            $artikel->foto = $filename;
        }
        $artikel->save();
        $artikel->tag()->sync($request->tag_id);
        //  $response = [
        //         'success' => true,
        //         'data' => $artikel,
        //         'message' =>'artikel berhasil diupdate'
        //     ];
        //     return response()->json($response, 200);
            return redirect()->route('artikel.index');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $artikel = Artikel::find($id);
          if (!$artikel) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'Artikel Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
         if ($artikel->foto) {
            $old_foto = $artikel->foto;
            $filepath = public_path() 
            . '/assets/img/artikel' . $artikel->foto;
            try {
                File::delete($filepath);
            }
             catch (FileNotFoundException $e){
                 // File sudah dihapus/tidak ada
             }
            }
            $artikel->tag()->detach($artikel->id);
            $artikel->delete();
            // $response = [
            //     'success' => true,
            //     'data' => $artikel,
            //     'message' =>'artikel berhasil dihapus'
            // ];
            // return response()->json($response, 200);
            return redirect()->route('artikel.index');
    
    }
}

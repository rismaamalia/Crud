<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tag = Tag::orderBy('created_at','desc')->get();
        return view('backend.tag.index', compact('tag'));
        //  $tag = Tag::all();
        // if (count($tag) <= 0)  {
        //     $response = [
        //         'success' => false,
        //         'data' => 'Empty',
        //         'message' =>'Tag Tidak ditemukan'
        //     ];
        //     return response()->json($response, 404);
        // }
        //  $response = [
        //         'success' => true,
        //         'data' => $tag,
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
         return view('backend.tag.create');
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
            'nama' => 'required|min:5'
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
        $tag = new Tag();
        $tag->nama = $request->nama;
        $tag->slug = str_slug($request->nama, '-');
        $tag->save();
        // //5. menampilkan response
        // $response = [
        //         'success' => true,
        //         'data' => $tag,
        //         'message' =>'kategori berhasil ditambahkan'
        //     ];
        //     return response()->json($response, 200);
            return redirect()->route('tag.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $tag = Tag::findOrFail($id);
        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'tag Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        //  $response = [
        //         'success' => true,
        //         'data' => $tag,
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
         $tag = Tag::findOrFail($id);
        return view('backend.tag.edit',compact('tag'));
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
         $tag = Tag::find($id);
         $input = $request->all();
        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'tag Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }

         $validator = Validator::make($input, [
            'nama' => 'required|min:5'
        ]);
      
        if ($validator->fails()){
             $response = [
                'success' => false,
                'data' => 'Validator Eror',
                'message' =>'$validator->errors()'
            ];
            return response()->json($response, 500);
        }

        $tag->nama = $request->nama;
        $tag->slug = str_slug($request->nama,'-');
        $tag->save();
        //  $response = [
        //         'success' => true,
        //         'data' => $tag,
        //         'message' =>'Tag berhasil diupdate'
        //     ];
        //     return response()->json($response, 200);
         return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $tag = Tag::find($id);
          if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'tag Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $tag->delete();
        //  $response = [
        //         'success' => true,
        //         'data' => $tag,
        //         'message' =>'tag berhasil dihapus'
        //     ];
        //     return response()->json($response, 200);
             return redirect()->route('kategori.index');
    
    
    }
}

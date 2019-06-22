<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Siswa;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        if (count($siswa <= 0)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'Siswa Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
         $response = [
                'success' => true,
                'data' => $siswa,
                'message' =>'berhasil'
            ];
            return response()->json($response, 200);
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $siswa = Siswa::create($input);

        //5. menampilkan response
        $response = [
                'success' => true,
                'data' => $siswa,
                'message' =>'Siswa berhasil ditambahkan'
            ];
            return response()->json($response, 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $siswa = Siswa::findOrFail($id);
        if (!$siswa) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'Siswa Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
         $response = [
                'success' => true,
                'data' => $siswa,
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
         $siswa = Siswa::find($id);
         $input = $request->all();
        if (!$siswa) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'Siswa Tidak ditemukan'
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

        $siswa->nama = $input['nama'];
        $siswa->save();

         $response = [
                'success' => true,
                'data' => $siswa,
                'message' =>'siswa berhasil diupdate'
            ];
            return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
          if (!$siswa) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' =>'Siswa Tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $siswa->delete();
         $response = [
                'success' => true,
                'data' => $siswa,
                'message' =>'siswa berhasil dihapus'
            ];
            return response()->json($response, 200);
    }
}

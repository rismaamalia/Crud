@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit kategori</div>

                <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id) }}" 
                    method="post"
                    enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

                <div class="form-group">
                    <label for="">Nama</label>
                    <input class="form-control" value="{{ $kategori->nama_kategori }}" type="text" name="nama_kategori" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-info">
                        Simpan Data
                    </button>
                </div>
                </form>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
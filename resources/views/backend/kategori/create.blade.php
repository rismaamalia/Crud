@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah kategori Baru</div>

                <div class="card-body">
                <form action="{{ route('kategori.store') }}" 
                    method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input class="form-control" type="text" name="nama_kategori" required>
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
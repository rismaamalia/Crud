@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Tag</div>

                <div class="card-body">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input class="form-control" value="{{ $tag->nama }}" type="text" name="nama_tag" disabled>
                </div>

                <div class="form-group">
                    <a href="{{ url('tag') }}" class="btn btn-outline-info">
                        Kembali
                    </a>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
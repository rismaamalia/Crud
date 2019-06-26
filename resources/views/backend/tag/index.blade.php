@extends('layouts.app')
<br>
<br>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tag</div>
                <div class="card-body">
                <br>
                    <center> <a href="{{ route('tag.create') }}"
                    class="btn btn-primary">Tambah</a>
                    </center>
                <br>
                <div class="table-responsive">
                     <table class="table">
                       <tr>
                           <th>No</th>
                           <th>Nama tag</th>
                           <th>Slug</th>

                           <th colspan="3">Aksi</th>
                       </tr>
                       @php $no =1; @endphp
                       @foreach ($tag as $data)
                       <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama}}</td>
                            <td>{{ $data->slug }}</td>
    
                            
                            <td>
                                <a href="{{ route('tag.edit',$data->id) }}" class="btn btn-sm btn-success">
                                            Edit </a>
                            </td>
                            
                            <td>
                                <a href="{{ route('tag.show',$data->id) }}" class="btn btn-sm btn-warning">
                                            Detail </a>
                            </td>        
                            
                            <td>
                                <form action="{{ route('tag.destroy',$data->id) }}" method="post">
                                    @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit">Hapus
        
                                        </button>
                                </form>
                            </td>
                        </tr>                      
                        @endforeach
                    </table>
                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
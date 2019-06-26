@extends('layouts.app')
<br>
<br>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">artikel</div>
                <div class="card-body">
                <br>
                    <center> <a href="{{ route('artikel.create') }}"
                    class="btn btn-primary">Tambah</a>
                    </center>
                <br>

                <div class="table-responsive">
                     <table class="table">
                       <tr>
                           <th>No</th>
                           <th>Judul</th>
                           <th>Slug</th>
                           <th>Kategori</th>
                           <th>Tag</th>
                           <th>Penulis</th>
                           <th>Foto</th>

                           <th colspan="3">Aksi</th>
                       </tr>
                       @php $no =1; @endphp
                       @foreach ($artikel as $data)
                       <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->slug }}</td>
                            <td>{{ $data->kategori->nama_kategori }}</td>
                            <td>
                                @foreach ($data->tag as $item )
                                <li>{{ $item->nama_tag}}</li>
                                
                                @endforeach
                            </td>
                            <td>{{ $data->user->name }}</td>
                            <td>
                                    <img width="100px" height="100px" 
                                     src ="{{asset('assets/img/artikel/'.
                                     $data->foto.'') }}" alt="foto">
                                </td>
                            
                            <td>
                                <a href="{{ route('artikel.edit',$data->id) }}" class="btn btn-sm btn-success">
                                            Edit </a>
                            </td>
                            
                            <td>
                                <a href="{{ route('artikel.show',$data->id) }}" class="btn btn-sm btn-warning">
                                            Detail </a>
                            </td>        
                            
                            <td>
                                <form action="{{ route('artikel.destroy',$data->id) }}" method="post">
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
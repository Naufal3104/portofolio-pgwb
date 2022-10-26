@extends('admin.body')
@section('title','Mastersiswa')
@section('content-title','Mastersiswa')
@section('content')
    <a class="btn btn-success mb-4" href="{{ route('siswa.create') }}">Tambah data</a>
    <div class = "row">
        <div class = "col-lg-12">
            <div class = "card shadow mb-4">
                <div class = "card-header py-3">
                    <h6 class = "m-8 font-weight-bold text-primary">Data Siswa</h6>
                </div>
                <div class = "card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th scope = "col">No.</th>
                                <th scope = "col">Nama</th>
                                <th scope = "col">Jenis Kelamin</th>
                                <th scope = "col">Email</th>
                                <th scope = "col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach($data as $item)
                            <tr>
                                <th scope = "row">{{ $i++}}</th>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->jk}}</td>
                                <td>{{ $item->email}}</td>
                                <td>
                                    <a href = "siswa/{{ $item->id}}" class = "btn btn-info btn-circle btn-sm"><i class = "fas fa-info-circle"></i></a>
                                    <a href = "siswa/{{ $item->id}}/edit" class = "btn btn-warning btn-circle btn-sm"><i class = "fas fa-edit"></i></a>
                                    <form action="siswa/{{$item->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class = "btn btn-danger btn-circle btn-sm"><i class = "fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
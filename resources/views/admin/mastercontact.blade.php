@extends('admin.body')
@section('title','Mastercontact')
@section('content-title','Mastercontact')
@section('content')
    <div class = "row">
        <div class = "col-lg-6">
            <div class = "card shadow mb-4">
                <div class = "card-header py-3">
                    <h6 class = "m-8 font-weight-bold text-primary">Kontak Siswa</h6>
                </div>
                <div class = "card-body">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th scope = "col">Nama Siswa</th>
                                <th scope = "col">Nisn Siswa</th>
                                <th scope = "col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data1 as $item)
                            <tr>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->nisn}}</td>
                                <td>
                           
                                    <a href="" onclick="show({{ $item->id }}, event)" class="btn btn-success btn-circle btn-sm"><i class = "fas fa-info-circle"></i></a>
                                    <a href="{{ route('contact.create') }}" class ="btn btn-warning btn-circle btn-sm"><i class = "fas fa-plus"></i></a>
                                        @csrf
                            @endforeach
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class = "col-lg-6">
            <div class = "card shadow mb-4">
                <div class = "card-header py-3">
                <h6 class = "m-8 font-weight-bold text-primary">Kontak siswa</h6>
                </div>
                    <div id="contact" class = "card-body">
                        <h6 style="text-align: center;">Pilih siswa terlebih dahulu</h6>
                    </div>
            </div>
        </div>
    </div>
    <script>
        function show(id ,e){
            e.preventDefault();
            $.get('/contact/'+id, function(data){
                $('#contact').html(data);
            })
        }
    </script>
@endsection
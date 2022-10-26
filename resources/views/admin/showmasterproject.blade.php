@if ($data1->isEmpty())
    <h6 class="text-center">Siswa belum memiliki project</h6>
@else
    @foreach($data1 as $item)
    <div class="card">
        <div class="card-header">
            {{$item->namaproject}}
        </div>
        <div class="card-body">
            <h5>Tanggal Project</h5>
            {{$item->tanggal}}
            <h5>Deskripsi Project</h5>
            {{$item->deskripsi}}
        </div>
        <div class="card-footer">
            <a href = "project/{{$item->id}}/edit" class = "btn btn-warning btn-circle btn-sm"><i class = "fas fa-edit"></i></a>
            <form action="project/{{$item->id}}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class = "btn btn-danger btn-circle btn-sm"><i class = "fas fa-trash"></i></button>
            </form>
        </div>
    </div>
    @endforeach
@endif
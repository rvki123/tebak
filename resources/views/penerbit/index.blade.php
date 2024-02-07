
<h1>Penerbit</h1>
@if(session('success'))
<div class="alert alert-success" >{{session('success')}}</div>
@endif

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="mb-3">
<a href="{{route('penerbit.create') }}" class="btn btn-primary">Tambah</a>
</div>

<form action="{{ route('penerbit.index')}}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="search-penerbit" value="{{request('search')}}">

        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div> 
</form>

<table class="table">
    <thead>
        <tr>
        <th>no</th>
            <th>nama_penerbit</th>
            <th>alamat</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
   
        @foreach($penerbit as $penerbit)
        <tr>
            
        <td>{{ $loop->iteration }}</td>
            <td>{{$penerbit->nama_penerbit}}</td>
            <td>{{$penerbit->alamat}}</td>

            <td>
                <a href="{{ route('penerbit.edit', $penerbit->penerbit_id)}}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('penerbit.destroy', $penerbit->penerbit_id)}}" method="POST" class="d-inline">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


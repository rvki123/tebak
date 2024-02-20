@extends('home')

@section('content')
    <h1>Tambah Peminjaman</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">
    {{csrf_field()}}
        <input type="hidden" name='nisn' value="{{ Auth::user()->nisn }}">
        

        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <select class="form-control" id="isbn" name="isbn" required>
                @foreach($buku as $item)
                    <option value="{{ $item->isbn }}">{{ $item->isbn }}</option>
                @endforeach
            </select>
        </div>

       


        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
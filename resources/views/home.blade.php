@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
           <center><img src="{{ url('images/untung.png') }}" width="300" alt=""></center> 
        </div>
        @foreach($buku as $buku)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('image/'.$buku->photo)}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Deskripsi</p>
            </div>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

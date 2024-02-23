@extends('home')
@section('content')
<div class="row">
  
  <div class="col-lg-6 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{url('images/buku.jpeg')}}" alt="chart success" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <?php 
              $bukus = \App\Buku::all()->count();
            ?>
            <span class="fw-medium d-block mb-1">Stock Buku</span>
            <h3 class="card-title mb-2">{{$bukus}}</h3>
            <small class="text-success fw-medium"></small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{url('images/user.jpeg')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <?php 
              $users = \App\User::where('role','siswa')->count();
            ?>
            <span class="fw-medium d-block mb-1">User</span>
            <h3 class="card-title mb-2">{{$users}}</h3>
            <small class="text-success fw-medium"></small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Total Revenue -->
  
  <!--/ Total Revenue -->
  <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
    <div class="row">
      
      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{url('images/pinjam.jpeg')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <?php 
              $pinjam = \App\Peminjaman::all()->count();
            ?>
            <span class="fw-medium d-block mb-1">Dipinjam</span>
            <h3 class="card-title mb-2">{{$pinjam}}</h3>
            <small class="text-success fw-medium"></small>
          </div>
        </div>
      </div>


      
      <!-- </div>
    <div class="row"> -->
      
    </div>
  </div>
</div>

<div class="row mb-5">
@foreach($buku as $u)
<div class="col-md-4 col-lg-3 mb-3">
    <div class="card h-100">
        <img class="card-img-top" src="{{ asset('image/'.$u->photo) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $u->judul }}</h5>
            <p class="card-text">
                Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            @if($u->stock == 0)
                <button class="btn btn-danger">Stock Habis</button>
            @else
                <a href="{{ route('buku.show', $u->isbn) }}" class="btn btn-outline-primary">Detail</a>
            @endif
        </div>
    </div>
</div>

  @endforeach
</div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .icon-hover:hover {
  border-color: #3b71ca !important;
  background-color: white !important;
  color: #3b71ca !important;
}

.icon-hover:hover i {
  color: #3b71ca !important;
}
    </style>
</head>
<body>
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class=" rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset('image/'.$buku->photo)}} "alt="" width="300" height="400" />
          </a>
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            Buku comic starwars
          </h4>

            <p>
                Modern look and quality demo item is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown clothing low-top shirts for
                men.
            </p>

          <div class="row">
            <dt class="col-3">Judul  :</dt>
            <dd class="col-9">Starwars</dd>

            <dt class="col-3">Penerbit    :</dt>
            <dd class="col-9">Telerie</dd>

            <dt class="col-3">Penulis :</dt>
            <dd class="col-9">Jackson irvine</dd>

            <dt class="col-3">Alamat    :</dt>
            <dd class="col-9">Australia</dd>
          </div>
          <hr/>

          <div class="row mb-4">
            <div class="col-md-4 col-6 mb-3">
              </div>
            </div>
          </div>
          <a href="{{ route('peminjaman.create', $buku ->isbn)}}" class="btn btn-warning shadow-0">Peminjaman</a>
        </div>
      </main>
    </div>
  </div>
</section>
</body>
</html>
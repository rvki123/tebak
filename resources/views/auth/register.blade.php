<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    
</style>

<body>
    <section class="h-100 bg-primary">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                    alt="" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">Student registration form</h3>

                                    <form method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-outline mb-4">
                                            <label for="nama_siswa" class="control-label">Name</label>
                                            <input id="nama_siswa" type="text" class="form-control"
                                                name="nama_siswa" value="{{ old('nama_siswa') }}" required autofocus>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="nisn" class="col-md-4 control-label">Nisn</label>
                                            <input id="nisn" type="number" class="form-control" name="nisn"
                                                value="{{ old('nisn') }}" required autofocus>

                                        </div>


                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                            <div class="mb-0 me-4">Gender :</div>
                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="femaleGender" value="female" />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="maleGender" value="male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <span>Kelas</span>
                                                <select class="select form-select mt-3" name="kelas">
                                                    <option value="">Kelas :</option>
                                                    <option value="10a">10a</option>
                                                    <option value="10b">10b</option>
                                                    <option value="11a">11a</option>
                                                    <option value="11b">11b</option>
                                                    <option value="12a">12a</option>
                                                    <option value="12b">12b</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                autocomplete="off" required>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="password" class="col-md-4 control-label">
                                                Password</label>
                                            <input id="password" type="password" class="form-control"
                                                name="password" required>

                                        </div>

                                            <div class="form-outline mb-4">
                                                <label for="password-confirm" class="col-md-4 control-label">Confirm
                                                    Password</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required>

                                            </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

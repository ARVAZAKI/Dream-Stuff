<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DreamStuff | tambah pemasukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="row">
        <div class="col-lg-3 mt-5 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">Tambah pemasukan</div>
                <div class="card-body">
                    <form action="{{ route('pemasukan', $stuff->kode_barang)}}" method="post">
                    @csrf
                    @method('put')
                    <label for="uang_masuk" class="form-label">Tambahkan uang</label>
                    <input type="number" class="form-control" name="uang_masuk" id="uang_masuk">
                    <input type="submit" class="btn btn-success mt-2" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
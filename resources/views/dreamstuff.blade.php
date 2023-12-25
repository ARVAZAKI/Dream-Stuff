@extends('layouts.template')
@section('content')
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="/">DREAMSTUFF</a>
          </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <button type="button" class="btn btn-warning mt-3 ms-3" data-bs-toggle="modal" data-bs-target="#addStuff">
    Tambah
  </button>
 <div class="row d-flex justify-content-center mt-3 mx-2 align-items-center">
   @foreach ($stuff as $item)
   <div class="col-lg-3 mt-3">
    <div class="card shadow-lg" style="width: 18rem;">
        <img src="{{asset('storage/photo/' . $item->image)}}" height="150px" width="150px" class="card-img-top img-cover" alt="">
          <div class="card-body">
            <h5 class="card-title">{{ $item->nama_barang }}</h5>
            <p class="card-text">Harga : {{ number_format($item->harga)}}</p>
            <p class="card-text">Uang terkumpul : {{ number_format($item->uang_terkumpul)}}</p>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahpemasukan">
              +
            </button>
            <a href="" class="btn btn-sm btn-warning">-</a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteStuff">
              Delete
            </button>
          </div>
    </div>
</div>
   @endforeach
</div>
{{-- add stuff --}}
<div class="modal fade" id="addStuff" tabindex="-1" aria-labelledby="addStuff" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Stuff</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
          @endif
          <form action="{{route('addStuff')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
            <label for="harga" class="form-label">harga</label>
            <input type="number" class="form-control" id="harga" name="harga">
            <label for="image" class="form-label">image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
           <input type="submit" class="btn btn-primary" value="Tambah"> 
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- delete stuff --}}
  <div class="modal fade" id="deleteStuff" tabindex="-1" aria-labelledby="deleteStuff" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteStuff">Delete Stuff</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          are u sure to delete this stuff?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          @foreach ($stuff as $item)
          <form action="{{ route('deleteStuff', $item->kode_barang)}}">
          <button class="btn btn-danger">Delete</button>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- tambah pemasukan --}}
  <div class="modal fade" id="tambahpemasukan" tabindex="-1" aria-labelledby="tambahpemasukan" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahpemasukan">Tambah pemasukan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('pemasukan', $item->kode_barang)}}" method="post">
            @csrf
            @method('put')
            <label for="uang_masuk">tambahkan uang</label>
            <input type="number" class="form-control" name="uang_masuk" id="uang_masuk">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" value="tambahkan">
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
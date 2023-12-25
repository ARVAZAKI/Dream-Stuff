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
  @if (Session::has('message'))
  <div class="alert alert-success mt-2 mb-2">{{Session::get('message')}}</div>
@endif
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
            <a href="{{route('pemasukan', $item->kode_barang)}}" class="btn btn-sm btn-success">+</a>
            <a href="{{route('pengeluaran', $item->kode_barang)}}" class="btn btn-sm btn-warning">-</a>
            <a href="{{route('deleteStuff', $item->kode_barang)}}" class="btn btn-sm btn-danger">Delete</a>
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
 
@endsection

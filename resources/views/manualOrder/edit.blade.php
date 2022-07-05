@extends('layouts.master')

@section('content')
  {{-- Alert --}}
  <div class="row">
    <div class="col-12">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-warning alert-dismissible show fade" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('error') }}
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Order {{ $id->nama }}</h4>
          <p class="card-description">
            {{-- Basic form elements --}}
          </p>
          <form class="forms-sample" action="{{ route('manualOrdersUpdate', ['id' => $id->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="exampleInputEmail3">Tanggal</label>
              <input name="tanggal" type="datetime-local" class="form-control " id="exampleInputEmail3" placeholder="Nama"
                value="{{ $id->tanggal }}" required>
            </div>
            <div class="form-group ">
              <label for="exampleInputEmail3">Nama</label>
              <input name="nama" type="text" class="form-control " id="exampleInputEmail3" placeholder="Nama"
                value="{{ $id->nama }}" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail3">No Telepon</label>
              <input name="noTelp" type="text" class="form-control" id="exampleInputEmail3"
                value="{{ $id->noTelp }}" placeholder="Nomor Telepon">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Alamat</label>
              <input name="alamat" type="text" class="form-control" id="exampleInputEmail3" placeholder="Alamat"
                value="{{ $id->alamat }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Kelurahan</label>
              <input name="kelurahan" type="text" class="form-control" id="exampleInputEmail3" placeholder="Kelurahan"
                required value="{{ $id->kelurahan }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Kecamatan</label>
              <input name="kecamatan" type="text" class="form-control" id="exampleInputEmail3" placeholder="Kelurahan"
                required value="{{ $id->kecamatan }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Jenis</label>
              <input name="jenis" type="text" class="form-control" id="exampleInputEmail3"
                placeholder="Jenis - jenis barang perkiraan" required value="{{ $id->jenis }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Berat</label>
              <input name="berat" type="number" class="form-control" id="exampleInputEmail3"
                placeholder="Perkiraan Berat barang" required value="{{ $id->berat }}">
            </div>

            <input type="hidden" name="status" value="diedit">
            <button type="submit" class="btn btn-primary me-2">Update</button>
            <button class="btn btn-light">Batal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

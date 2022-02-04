@extends('layouts.master')
@section('head')
  <script src="{{ asset('admin/js/select2.js') }}"></script>
@endsection

@section('content')
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Barang Baru</h4>
          <p class="card-description">
            {{-- Basic form elements --}}
          </p>
          <form class="forms-sample">
            <div class="form-group">
              <label for="exampleInputName1">Jenis Barang</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Sub Barang</label>
              <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Harga</label>
              <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="img[]" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Pilih Gambar</button>
                </span>
              </div>
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Barang</h4>
          <p class="card-description">
            {{-- Add class <code>.table-striped</code> --}}
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> No</th>
                  <th> Nama Barang</th>
                  <th> Harga </th>
                  <th> Gambar </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($barang as $b)
                  <tr>
                    <td class="py-1">
                      {{ $loop->iteration }}
                    </td>
                    <td> {{ $b->sub }} </td>
                    <td> {{ $b->harga }} </td>
                    <td> gambar </td>
                    <td> Aksi </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="{{ asset('admin/js/file-upload.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/typeahead.js') }}"></script> --}}
@endsection

@extends('layouts.master')
@section('head')
  {{-- Select2 --}}
  <script src="{{ asset('admin/vendors/jquery/dist/jquery.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
@endsection

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
  <a href="{{ url('/manualorders/create') }}" class="btn btn-primary mb-2">Tambah Data</a>
  <div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Order Manual</h4>
          <p class="card-description">
            {{-- Add class <code>.table-striped</code> --}}
          </p>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th> No</th>
                  <th> Nama </th>
                  <th> No Telepon </th>
                  <th> Alamat </th>
                  <th> Kelurahan </th>
                  <th> Jenis </th>
                  <th> Perkiraan Berat </th>
                  <th> Status </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($manualOrders as $o)
                  <tr>
                    <td class="py-1">
                      {{ $loop->iteration }}
                    </td>
                    <td> {{ $o->nama }} </td>
                    <td> {{ $o->noTelp }} </td>
                    <td> {{ $o->alamat }} </td>
                    <td> {{ $o->kelurahan }} </td>
                    <td> {{ $o->jenis }} </td>
                    <td> {{ $o->berat }} </td>
                    <td>
                      <a href="{{ url('/manualorders/edit/' . $o->id) }}" class="btn text-primary px-1">
                        <i class="mdi-icon mdi mdi-grease-pencil"></i>
                        Edit</a>
                      <button class="btn text-danger px-1" data-bs-toggle="modal" data-bs-target="#modalHapus"
                        data-id="{{ $o->id }}" data-nama="{{ $o->nama }}"> <i class="fa fa-trash"
                          aria-hidden="true"></i>
                        Hapus
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Hapus-->
  <div class="modal fade modalHapus" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Order</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="formHapus">
            @method('delete')
            @csrf
            <p class="modal-text"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Hapus</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('admin/js/file-upload.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#modalHapus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var nama = button.data('nama')
        var modal = $(this)
        modal.find('.modal-text').text('Hapus Order ' + nama + ' ?')
        document.getElementById('formHapus').action = '/manualorders/' + id;
      })
    });
  </script>
@endsection

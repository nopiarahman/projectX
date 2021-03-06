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
          <h4 class="card-title">Tambah Petugas Logistik</h4>
          <p class="card-description">
            {{-- Basic form elements --}}
          </p>
          <form class="forms-sample" action="{{ route('logistikSimpan') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
              <label for="exampleInputEmail3">Nama</label>
              <input name="nama" type="text" class="form-control " id="exampleInputEmail3" placeholder="Nama" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail3">Nomor Telepon</label>
              <input name="noHp" type="text" class="form-control" id="exampleInputEmail3" placeholder="nomor Telepon"
                required>
            </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <button class="btn btn-light">Batal</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Petugas Logistik</h4>
          <p class="card-description">
            {{-- Add class <code>.table-striped</code> --}}
          </p>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th> No</th>
                  <th> Nama </th>
                  <th> Nomor Telepon </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logistik as $l)
                  <tr>
                    <td class="py-1">
                      {{ $loop->iteration }}
                    </td>
                    <td> {{ $l->nama }} </td>
                    <td> {{ $l->noHp }} </td>
                    <td>
                      <a type="button" class="btn text-success px-1"> <i class="mdi-icon mdi mdi-magnify"></i>
                        Detail</a>
                      <button type="button" class="btn text-primary px-1" data-id="{{ $l->id }}"
                        data-nama="{{ $l->nama }}" data-nohp="{{ $l->noHp }}" data-bs-toggle="modal"
                        data-bs-target="#modalEdit"> <i class="mdi-icon mdi mdi-grease-pencil"></i>
                        Edit
                      </button>
                      <button class="btn text-danger px-1" data-bs-toggle="modal" data-bs-target="#modalHapus"
                        data-id="{{ $l->id }}" data-nama="{{ $l->nama }}"> <i class="fa fa-trash"
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

  {{-- Modal Edit --}}
  <div class="modal fade modalEdit " id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Petugas Logistik</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="formEdit" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group ">
              <label for="exampleInputEmail3">Nama</label>
              <input name="nama" type="text" class="form-control " id="namaEdit" placeholder="Nama" required>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail3">Nomor Telepon</label>
              <input name="noHp" type="text" class="form-control" id="noHpEdit" placeholder="nomor Telepon" required>
            </div>

            <button type="submit" class="btn btn-primary me-2">Edit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Petugas Logistik</h5>
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
      $('#modalEdit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var nama = button.data('nama')
        var nohp = button.data('nohp')
        document.getElementById('formEdit').action = 'logistik/' + id;
        $('#namaEdit').val(nama);
        $('#noHpEdit').val(nohp);
      })
    });
    $(document).ready(function() {
      $('#modalHapus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var nama = button.data('nama')
        var modal = $(this)
        modal.find('.modal-text').text('Hapus Petugas ' + nama + ' ?')
        document.getElementById('formHapus').action = 'logistik/' + id;
      })
    });
  </script>
@endsection

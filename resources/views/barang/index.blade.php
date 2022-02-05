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
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Barang Baru</h4>
          <p class="card-description">
            {{-- Basic form elements --}}
          </p>
          <form class="forms-sample" action="{{ route('barangSimpan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Jenis Barang</label>
              {{-- <input type="text" name="jenis" class=" jenisBarang"> --}}
              <div class="input-group col-xs-12">
                <select name="jenisLama" id="jenis" class="form-control cariJenis">
                </select>
                <span class="input-group-append">
                  <span class="mx-4">atau</span>
                  <a class="file-upload-browse btn btn-primary" type=" button" onclick="showJenisBaru()">Jenis Barang
                    Baru</a>
                </span>
              </div>
            </div>

            <div class="form-group jenisBaru d-none">
              <label for="exampleInputEmail3">Jenis barang Baru</label>
              <input name="jenisBaru" type="text" class="form-control " id="exampleInputEmail3"
                placeholder="Jenis Barang Baru" onchange="removeJenis()">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail3">Sub Jenis Barang</label>
              <input name="sub" type="text" class="form-control" id="exampleInputEmail3" placeholder="Sub Jenis Barang"
                required>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text ">Rp</span>
                </div>
                <input name="harga" type="text" class="form-control" aria-label="Amount (to the nearest rupiah)"
                  required>
              </div>
            </div>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="gambar" class="file-upload-default">
              <div class="input-group col-xs-12">
                <span class="input-group-append mr-2">
                  <button class="file-upload-browse btn btn-primary btn-sm " type="button">Pilih Gambar</button>
                </span>
                <input type="text" class="form-control file-upload-info pl-2" placeholder="Upload Image">
              </div>
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
          <h4 class="card-title">Daftar Barang</h4>
          <p class="card-description">
            {{-- Add class <code>.table-striped</code> --}}
          </p>
          <div class="table-responsive">
            <table class="table table-hover">
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
                @php
                  $perJenis = $barang;
                @endphp
                @foreach ($perJenis as $jenis => $barang)
                  <tr>
                    <th colspan="5">{{ $jenis }}</th>
                  </tr>
                  @foreach ($barang as $b)
                    <tr>
                      <td class="py-1">
                        {{ $loop->iteration }}
                      </td>
                      <td> {{ $b->sub }} </td>
                      <td> {{ $b->harga }} </td>
                      @if ($b->gambar)
                        <td>{{ $b->getFirstMedia() }}</td>
                      @else
                        <td> - </td>
                      @endif
                      <td>
                        <button type="button" class="btn text-primary px-1" data-id="{{ $b->id }}"
                          data-sub="{{ $b->sub }}" data-harga="{{ $b->harga }}" data-bs-toggle="modal"
                          data-gambar="{{ $b->getFirstMediaUrl() }}" data-bs-target="#modalEdit"> <i
                            class="mdi-icon mdi mdi-grease-pencil"></i>
                          Edit
                        </button>
                        <button class="btn text-danger px-1" data-bs-toggle="modal" data-bs-target="#modalHapus"
                          data-id="{{ $b->id }}" data-sub="{{ $b->sub }}"> <i class="fa fa-trash"
                            aria-hidden="true"></i>
                          Hapus
                        </button>
                      </td>
                    </tr>
                  @endforeach
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
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Barang</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="formEdit" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail3">Sub Jenis Barang</label>
              <input name="sub" type="text" class="form-control" id="subEdit" placeholder="Sub Jenis Barang" required>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text ">Rp</span>
                </div>
                <input name="harga" type="text" class="form-control" aria-label="Amount (to the nearest rupiah)"
                  required id="hargaEdit">
              </div>
            </div>
            <img src="" alt="" id="gambarLama" width="200px" class="mb-2">
            <div class="form-group">
              <label>Ubah Gambar</label>
              <input type="file" name="gambar" class="file-upload-default">
              <div class="input-group col-xs-12">
                <span class="input-group-append mr-2">
                  <button class="file-upload-browse btn btn-primary btn-sm " type="button">Pilih Gambar</button>
                </span>
                <input type="text" class="form-control file-upload-info pl-2" placeholder="Upload Image">
              </div>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h5>
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
  <script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
  <script type="text/javascript">
    $('.cariJenis').select2({
      placeholder: 'Cari Jenis Barang...',
      ajax: {
        url: '/cariJenisBarang',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
          return {
            results: $.map(data, function(item) {
              return {
                text: item.jenis,
                /* memasukkan text di option => <option>namaSurah</option> */
                id: item.jenis /* memasukkan value di option => <option value=id> */
              }
            })
          };
        },
        cache: true
      }
    });

    function showJenisBaru() {
      var inputBaru = document.querySelector('.jenisBaru');
      inputBaru.className = 'form-group jenisBaru';
    }
    document.getElementById("jenis").onchange = changeListener;

    function changeListener() {
      var value = this.value
      var inputBaru = document.querySelector('.jenisBaru');
      console.log(value);
      if (value == "input") {
        inputBaru.className = 'form-group jenisBaru';
      } else {
        inputBaru.className = 'form-group jenisBaru d-none';
      }
    }

    function removeJenis() {
      var select = document.getElementById("jenis");
      var length = select.options.length;
      for (i = length - 1; i >= 0; i--) {
        select.options[i] = null;
      }
    }

    $(document).ready(function() {
      $('#modalEdit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var sub = button.data('sub')
        var harga = button.data('harga')
        var gambar = button.data('gambar')
        document.getElementById('formEdit').action = 'barang/' + id;
        $('#subEdit').val(sub);
        $('#hargaEdit').val(harga);
        // $('#gambarLama').src(gambar);
        document.getElementById("gambarLama").src = gambar;

      })
    });
    $(document).ready(function() {
      $('#modalHapus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var sub = button.data('sub')
        var modal = $(this)
        modal.find('.modal-text').text('Hapus Barang ' + sub + ' ?')
        document.getElementById('formHapus').action = 'barang/' + id;
      })
    });
  </script>
@endsection

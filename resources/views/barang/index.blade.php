@extends('layouts.master')
@section('head')
  {{-- Select2 --}}
  <script src="{{ asset('admin/vendors/jquery/dist/jquery.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
  {{-- Light Galery --}}
  <link rel="stylesheet" href="{{ asset('admin/vendors/lightgallery/lightgallery.min.css') }}">
  <script src="{{ asset('admin/vendors/lightgallery/lightgallery.min.js') }}"></script>

@endsection

@section('content')
  {{-- Alert --}}
  <div class="row">
    <div class="col-12">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-warning alert-dismissible show fade" role="alert">
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
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
                        <button class="btn text-primary px-1"> <i class="mdi-icon mdi mdi-grease-pencil"></i>
                          Edit
                        </button>
                        <button class="btn text-danger px-1"> <i class="fa fa-trash" aria-hidden="true"></i>
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
  </script>
@endsection

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

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Pelanggan</h4>
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
                  <th> Email </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pelanggan as $p)
                  <tr>
                    <td class="py-1">
                      {{ $loop->iteration }}
                    </td>
                    <td> {{ $p->nama }} </td>
                    <td> {{ $p->noHp }} </td>
                    <td> {{ $p->email }} </td>
                    <td>
                      <a type="button" class="btn text-primary px-1"> <i class="mdi-icon mdi mdi-magnify"></i>
                        Detail</a>
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
@endsection

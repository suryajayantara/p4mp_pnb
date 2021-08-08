@extends('ui.dashboard')

@section('content')
<div class="row my-5 mx-auto">
    <div class="col-md-10">
        <form>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Jurusan">
          </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('faculties.create') }}" class="btn btn-success">Tambah Data</a>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Jurusan</th>
        <th scope="col">Deskripsi</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datas as $item)
      <tr>
        <th scope="row">1</th>
        <td>{{ $item->faculty_name }}</td>
        <td>{{ $item->desc }}</td>
        <td class="text-center">
            <a href="#" class="btn btn-warning btn-sm">Edit</a>
            <form action="" method="post">
                <a href="{{ route('faculties.destroy',$item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
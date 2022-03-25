@extends('ui.dashboard')

@section('content')
<div class="row my-5 mx-auto">
    <div class="col-md-10">
        <form action="{{ url()->current() }}" method="GET">
            <div class="input-group mb-3">
                <input name="cari" value="{{ request('cari') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Dokumen Kategori">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('category_documents.create') }}" class="btn btn-success">Tambah Data</a>
    </div>
</div>

{{-- success --}}
@if(session('success'))
<div class="mb-4 mx-2 alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Dokumen Kategori</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($category_documents as $category_document)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $category_document->category_name }}</td>
        <td>{{ $category_document->desc }}</td>
        <td class="row">
          <div class="mx-1 my-1">
            <a href="{{ route('category_documents.edit',$category_document->id) }}" class="btn btn-warning btn-sm">Edit</a>
          </div>
          <div class="mx-1 my-1">
            <form action="{{ route('category_documents.destroy',$category_document->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick = "return confirm('Yakin hapus jurusan?')">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $category_documents->links() }}
  </div>
@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

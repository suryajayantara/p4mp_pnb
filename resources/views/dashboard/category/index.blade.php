@extends('ui.dashboard')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
</div>
<!-- Content Row -->
<div class="row my-5 mx-auto">
    <div class="col-md-10">
        <form action="{{ url()->current() }}" method="GET">
            <div class="input-group mb-3">
                <input name="cari" value="{{ request('cari') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Kategori">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
          </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah Kategori</a>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Deskripsi</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td> {{ ucwords($category->category_name) }} </td>
                <td> {{ substr(strip_tags($category->desc),0,30) }}... </td>
                <td class="text-center"> 
                    <a href="{{ route('categories.edit',$category->id) }}"><button class="btn btn-warning">Edit</button></a>
                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick = "return confirm('Yakin hapus kategori?')">Hapus</button> 
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $categories->links() }}
  </div>
  
@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
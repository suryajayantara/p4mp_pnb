@extends('ui.dashboard')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Posts</h1>
</div>
<!-- Content Row -->
<div class="row my-5 mx-auto">
    <div class="col-md-10">
        <form action="{{ url()->current() }}" method="GET">
            <div class="input-group mb-3">
                <input name="cari" value="{{ request('cari') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Post">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
          </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Tambah Post</a>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nama</th>
        <th scope="col">Judul Post</th>
        <th scope="col">Konten</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td> {{ ucwords($post->category->category_name) }} </td>
                <td> {{ ucwords($post->user->name) }} </td>
                <td> {{ ucwords($post->title) }} </td>
                <td> {{ substr(strip_tags($post->content),0,30) }}... </td>
                <td class="text-center"> 
                    <a href="{{ route('posts.edit',$post->id) }}"><button class="btn btn-warning">Edit</button></a>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick = "return confirm('Yakin hapus post?')">Hapus</button> 
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
  
@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
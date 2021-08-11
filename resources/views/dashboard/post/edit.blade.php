@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                <select class="form-control mb-3" aria-label="Default select example" name="category_id" required>
                    <option value="" selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected':'' }}>{{ ucwords($category->category_name) }}</option>
                    @endforeach
                  </select>
                <label for="exampleInputEmail1" class="form-label">Foto</label><br>
                <img src="{{ asset('foto_post') }}/{{ $post->url_photo }}" alt="" style="width: 100px; height:70px;">
                <input name="url_photo" type="file" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                <label for="exampleInputEmail1" class="form-label">Judul Post</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $post->title }}" required>
                <textarea name="content" class="form-control my-3" placeholder="Masukan isi post disini" id="floatingTextarea2" style="height: 100px" required>{{ $post->content }}</textarea>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>    
        <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-danger">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
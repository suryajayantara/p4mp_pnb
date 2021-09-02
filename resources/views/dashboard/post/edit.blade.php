@extends('ui.dashboard')

@section('content')


        <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-lg" data-aos="flip-right">
                    <img src="{{ asset('foto_post') }}/{{ $post->url_photo }}" class="card-img-top" alt="brt-01" style="height: 400px">
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <select class="form-control mb-3" aria-label="Default select example" name="category_id" required>
                                <option value="" selected>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected':'' }}>{{ ucwords($category->category_name) }}</option>
                                @endforeach
                              </select>
                            <label for="exampleInputEmail1" class="form-label">Foto</label>
                            <input name="url_photo" type="file" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <label for="exampleInputEmail1" class="form-label">Judul Post</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $post->title }}" required>
                            <textarea name="content" class="form-control my-3" placeholder="Masukan isi post disini" id="floatingTextarea2" style="height: 100px" required>{{ $post->content }}</textarea>
                        <button type="submit" class="btn btn-lg w-100 my-2 btn-success">Edit</button>
                    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-lg w-100 btn-danger">Kembali</button></a>
                    </div>
                </div>
            </div>
        </form> 
@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
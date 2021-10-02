@extends('ui.dashboard')

@section('content')

        <form action="{{ route('about.update',$post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-lg" data-aos="flip-right">
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="" value="{{ $post->id }}">
                            <input type="hidden" name="category_id" id="" value="{{ $post->category_id }}">
                            <label for="exampleInputEmail1" class="form-label">Judul Visi Misi</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $post->title }}" required>
                            <textarea name="content" class="ckeditor" placeholder="Masukan isi post disini" id="wysiwyg" style="height: 100px" required>{{ $post->content }}</textarea>
                        <button type="submit" class="btn btn-lg w-100 my-2 btn-success">Edit</button>
                    <a href="/visimisi"><button type="button" class="btn btn-lg w-100 btn-danger">Kembali</button></a>
                    </div>
                </div>
            </div>
        </form> 
@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
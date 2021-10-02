@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('about.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                <select class="form-control mb-3" aria-label="Default select example" name="category_id" required>
            
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" selected>{{ ucwords($category->category_name) }}</option>
                    @endforeach
                  </select>
                <label for="exampleInputEmail1" class="form-label">Judul Visi Misi</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label my-3">Isi Visi Misi</label>
                <textarea name="content" class="ckeditor" id="wysiwyg" placeholder="Masukan isi post disini" style="height: 100px" required></textarea>
            <button type="submit" class="btn btn-lg w-100 my-2 btn-primary">Tambah</button>
          </form>
          <a href="/visimisi"><button type="button" class="btn btn-lg w-100 btn-danger">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
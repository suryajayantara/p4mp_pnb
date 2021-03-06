@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('categories.store') }}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                <input name="category_name" type="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <textarea name="desc" class="form-control my-3" placeholder="Masukan Deksripsi Kategori Disini" id="floatingTextarea2" style="height: 100px"></textarea>
            <button type="submit" class="btn btn-lg btn-primary w-100 my-2">Tambah</button>
          </form>
          <a href="{{ route('categories.index') }}"><button type="button" class="btn btn-lg btn-danger w-100">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
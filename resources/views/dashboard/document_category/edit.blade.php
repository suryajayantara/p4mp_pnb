@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('category_documents.update', $categoryDocument->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="m-3">

                {{-- nama Dokumen Kategori --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Nama Dokumen Kategori</label>
                    <input name="category_name" type="Name" value="{{ $categoryDocument->category_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- deskripsi --}}
                <div class="form-group row">
                    <textarea name="desc" class="form-control " placeholder="Masukan Deksripsi Jurusan Disini" id="floatingTextarea2" style="height: 100px" required>{{ $categoryDocument->desc }}</textarea>
                </div>

                {{-- tambah --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-success w-100 mt-3">Simpan</button>
                </div>

        </form>
        <a href="{{ route('category_documents.index') }}">
            {{-- kembali --}}
            <div class="form-group row">
                <button type="button" class="btn btn-lg btn-danger w-100">Kembali</button>
            </div>
        </a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

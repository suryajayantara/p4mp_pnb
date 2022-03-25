@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="m-3">

                {{-- dokumen --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Dokumen</label>
                    <input name="url_file" type="file" class="form-control mb-3 @error('url_file') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('url_file')
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                        </div>
                    @enderror

                </div>

                {{-- nama dokumen --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Nama Dokumen</label>
                    <input name="title" type="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Kategori --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                    <select name="id_category" id="id_category" class="form-control " aria-label="Default select example" required>
                        @foreach ($category_document as $items)
                        <option value="{{ $items->id }}">{{ $items->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- deskripsi --}}
                <div class="form-group row">
                    <textarea name="desc" class="form-control" placeholder="Masukan Deksripsi Dokumen Disini" id="floatingTextarea2" style="height: 100px" required></textarea>
                </div>

                {{-- tambah --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mt-3">Tambah</button>
                </div>

          </form>
          <a href="{{ route('documents.index') }}">
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

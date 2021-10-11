@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('faculties.store') }}" method="post" >
            @csrf
            <div class="m-3">

                {{-- nama jurusan --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
                    <input name="faculty_name" type="Name" class="form-control @error('faculty_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('faculty_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- deskripsi --}}
                <div class="form-group row">
                    <textarea name="desc" class="form-control" placeholder="Masukan Deksripsi Jurusan Disini" id="floatingTextarea2" style="height: 100px" required></textarea>
                </div>

                {{-- tambah --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mt-3">Tambah</button>
                </div>

          </form>
          <a href="{{ route('faculties.index') }}">
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

@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('departements.store') }}" method="post" >
            @csrf
            <div class="m-3">

                {{-- nama jurusan --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
                    <select name="id_faculty" id="id_faculty" class="form-control @error('id_faculty') is-invalid @enderror" aria-label="Default select example" required>
                        @foreach ($dats as $items)
                        <option value="{{ $items->id }}">{{ $items->faculty_name }}</option>
                        @endforeach
                    </select>
                    @error('id_faculty')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- nama departement --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Nama Departement</label>
                    <input name="departement_name" type="Name" class="form-control @error('departement_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('departement_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- tambah --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mt-3">Tambah</button>
                </div>

          </form>
        <a href="{{ route('departements.index') }}">
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

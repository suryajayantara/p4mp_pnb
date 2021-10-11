@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('internationals.store') }}" method="post" >
            @csrf
            <div class="m-3">

                {{-- program studi --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                    <select name="id_faculties"  class="form-control @error('id_faculties') is-invalid @enderror" aria-label="Default select example" required>
                        <option value="" selected>Pilih Fakultas</option>
                        @foreach ($faculty_data as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                        @endforeach
                    </select>
                    @error('id_faculties')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- fakultas --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Fakultas</label>
                    <select name="id_study" id="id_faculty" class="form-control @error('id_study') is-invalid @enderror" aria-label="Default select example" required>
                        <option value="" selected>Pilih Departemen</option>
                        @foreach ($departement_data as $departement)
                        <option value="{{ $departement->id }}">{{ $departement->departement_name }}</option>
                        @endforeach
                    </select>
                    @error('id_study')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- jenjang --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                    <select name="level" id="level" class="form-control " aria-label="Default select example" required>
                        <option value="d1">D1</option>
                        <option value="d2">D2</option>
                        <option value="d3">D3</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                    </select>
                </div>

                {{-- deskripsi --}}
                <div class="form-group row">
                    <textarea name="result" class="form-control " placeholder="Masukan Deksripsi Lembaga Akreditasi Disini" id="floatingTextarea2" style="height: 100px" required></textarea>
                </div>

                {{-- negara --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Negara</label>
                    <input name="country" type="Name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Tanggal Assessment (Awal) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Assessment (Awal)</label>
                    <input name="s_assessment" type="date" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Tanggal Assessment (Akhir) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Assessment (Akhir)</label>
                    <input name="e_assessment" type="date" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Masa Berlaku (Awal) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                    <input name="start_date" type="date" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Masa Berlaku (Akhir) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                    <input name="end_date" type="date" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- tambah --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mt-3">Tambah</button>
                </div>
          </form>

        {{-- kembali --}}
        <a href="{{ route('internationals.index') }}">
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

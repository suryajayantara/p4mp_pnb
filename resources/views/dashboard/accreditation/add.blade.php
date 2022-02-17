@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('accreditations.store') }}" method="post" >
            @csrf
            <div class="m-3">

                {{-- Prodi --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                    <select name="id_study" id="id_faculty" class="form-control   @error('id_study') is-invalid @enderror" aria-label="Default select example" required>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->departement_name }}</option>
                        @endforeach
                    </select>
                    @error('id_study')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Jenjang --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                    <select name="id_level" id="id_level" class="form-control " aria-label="Default select example" required>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Lembaga Akreditasi --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Lembaga Akreditasi</label>
                    <input name="institution" type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Hasil --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Hasil</label>
                    <input name="result" type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
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

                {{-- Tambah --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mt-3">Tambah</button>
                </div>

          </form>

          {{-- Kembali --}}
          <a href="{{ route('accreditations.index') }}">
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

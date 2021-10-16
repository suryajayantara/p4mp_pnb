@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">
        {{ Form::model($accreditationInternational, array('route' => array('accreditation_internationals.update', $accreditationInternational->id), 'method' => 'PUT')) }}
        @csrf
        @method('PUT')
        <div class="m-3">

            {{-- fakultas --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Fakultas</label>
                <select name="id_faculties" class="form-control " aria-label="Default select example" required>
                    @foreach ($faculty_data as $faculty)
                    <option value="{{ $faculty->id }}" {{ ( $faculty->id == $accreditationInternational->id_faculties) ? 'selected' : '' }}>
                        {{ $faculty->faculty_name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- program studi --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                <select name="id_study" class="form-control " aria-label="Default select example" required>
                    @foreach ($departement_data as $departement)
                    <option value="{{ $departement->id }}" {{ ( $departement->id == $accreditationInternational->id_study) ? 'selected' : '' }}>
                        {{ $departement->departement_name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- jenjang --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                <select name="id_level" id="id_level" class="form-control " aria-label="Default select example" required>
                    @foreach ($level_data as $v_level)
                    <option value="{{ $v_level->id }}" {{ ( $v_level->id == $accreditationInternational['id_level']) ? 'selected' : '' }}>
                        {{ $v_level->level_name }}
                    </option>
                @endforeach
                </select>
            </div>

            {{-- deskripsi --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Deksripsi Lembaga Akreditasi</label>
                <textarea name="accreditatition_agency" class="form-control " placeholder="Masukan Deksripsi Lembaga Akreditasi Disini" id="floatingTextarea2" style="height: 100px" required>{{ $accreditationInternational->accreditatition_agency }}</textarea>
            </div>

            {{-- negara --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Negara</label>
                <input name="country" type="Name" value="{{ $accreditationInternational->country }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>

            {{-- tanggal asesmen (awal) --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Tanggal Asesmen (Awal)</label>
                <input name="s_assessment" type="date" value="{{ $accreditationInternational->s_assessment }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>

            {{-- tanggal asesmen (akhir) --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Tanggal Asesmen (Akhir)</label>
                <input name="e_assessment" type="date" value="{{ $accreditationInternational->e_assessment }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>

            {{-- masa berlaku (awal) --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                <input name="start_date" type="date" value="{{ $accreditationInternational->start_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>

            {{-- masa berlaku (akhir) --}}
            <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                <input name="end_date" type="date" value="{{ $accreditationInternational->end_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>

            {{-- simpan --}}
            <div class="form-group row">
                <button type="submit" class="btn btn-lg btn-success w-100 mt-3">Simpan</button>
            </div>
            {{ Form::close() }}

        <a href="{{ route('accreditation_internationals.index') }}">
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

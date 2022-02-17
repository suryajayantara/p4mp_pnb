@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        {{ Form::model($accreditation_data, array('route' => array('accreditations.update', $accreditation_data->id), 'method' => 'PUT')) }}
            @csrf

            {{-- program studi --}}
            <div class="m-3">
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                    <select name="id_study" class="form-control " aria-label="Default select example" required>
                    @foreach ($departement_data as $v_departement)
                        <option value="{{ $v_departement->id }}" {{ ( $v_departement->id == $accreditation_data['id_study']) ? 'selected' : '' }}>
                            {{ $v_departement->departement_name }}
                        </option>
                    @endforeach
                    </select>
                </div>

                {{-- Jenjang --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                    <select name="id_level" id="id_level" class="form-control " aria-label="Default select example" required>
                        @foreach ($level_data as $v_level)
                        <option value="{{ $v_level->id }}" {{ ( $v_level->id == $accreditation_data['id_level']) ? 'selected' : '' }}>
                            {{ $v_level->level_name }}
                        </option>
                    @endforeach
                    </select>
                </div>

                {{-- lembaga akreditasi --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Lembaga Akreditasi</label>
                    <input name="institution" type="text" value="{{ $accreditation_data->institution }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Hasil --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Hasil</label>
                    <input name="result" type="text" value="{{ $accreditation_data->result }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Masa Berlaku (Awal) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                    <input name="start_date" type="date" value="{{ $accreditation_data->start_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Masa Berlaku (Akhir) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                <input name="end_date" type="date" value="{{ $accreditation_data->end_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Simpan --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-success w-100 mt-3">Simpan</button>
                </div>

        {{ Form::close() }}
        {{-- Kembali --}}
        <a href="{{ route('accreditations.index') }}">
            <div class="form-group row">
                <button type="button" class="btn btn-lg btn-danger w-100 ">Kembali</button>
            </div>
        </a>

    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        {{ Form::model($certification_data, array('route' => array('certifications.update', $certification_data->id), 'method' => 'PUT')) }}
            @csrf

            {{-- program studi --}}
            <div class="m-3">
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                    <select name="id_study" class="form-control " aria-label="Default select example" required>
                    @foreach ($departement_data as $value)
                        <option value="{{ $value->id }}" {{ ( $value->id == $certification_data['id_study']) ? 'selected' : '' }}>
                            {{ $value->departement_name }}
                        </option>
                    @endforeach
                    </select>
                </div>

                {{-- Jenjang --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                    <select name="level" id="level" class="form-control " aria-label="Default select example" required>
                        <option >{{ $certification_data->level }}</option>
                        <option value="d1">D1</option>
                        <option value="d2">D2</option>
                        <option value="d3">D3</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                    </select>
                </div>

                {{-- Hasil --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Hasil</label>
                    <input name="result" type="Name" value="{{ $certification_data->result }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Masa Berlaku (Awal) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                    <input name="start_date" type="date" value="{{ $certification_data->start_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Masa Berlaku (Akhir) --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                <input name="end_date" type="date" value="{{ $certification_data->end_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- Simpan --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-success w-100 mt-3">Simpan</button>
                </div>

        {{ Form::close() }}
        {{-- Kembali --}}
        <a href="{{ route('certifications.index') }}">
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

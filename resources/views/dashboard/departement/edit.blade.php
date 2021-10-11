@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        {{ Form::model($departement_data, array('route' => array('departements.update', $departement_data->id), 'method' => 'PUT')) }}
            @csrf
            <div class="m-3">

                {{-- nama jurusan --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
                    <select name="id_faculty" class="form-control " aria-label="Default select example" required>
                        @foreach ($faculty_data as $value)
                            <option value="{{ $value->id }}" {{ ( $value->id == $departement_data['id_faculty']) ? 'selected' : '' }}>
                                {{ $value->faculty_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- nama departement --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Nama Departement</label>
                    <input name="departement_name" value="{{ $departement_data['departement_name'] }}" type="Name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                {{-- simpan --}}
                <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-success w-100 mt-3">Simpan</button>
                </div>
        {{ Form::close() }}
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

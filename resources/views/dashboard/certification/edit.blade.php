@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        {{ Form::model($certification_data, array('route' => array('certifications.update', $certification_data->id), 'method' => 'PUT')) }}
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                <select name="id_study" class="form-control mb-3" aria-label="Default select example" required>
                    @foreach ($departement_data as $value)
                        <option value="{{ $value->id }}" {{ ( $value->id == $certification_data['id_study']) ? 'selected' : '' }}>
                            {{ $value->departement_name }}
                        </option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                <input name="level" type="Name" value="{{ $certification_data->level }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <textarea name="result" class="form-control my-3" placeholder="Masukan Deksripsi Jurusan Disini" id="floatingTextarea2" style="height: 100px" required>{{ $certification_data->result }}</textarea>
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                <input name="start_date" type="date" value="{{ $certification_data->start_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                <input name="end_date" type="date" value="{{ $certification_data->end_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <button type="submit" class="btn btn-lg btn-success w-100 my-2">Edit</button>
        {{ Form::close() }}
        <a href="{{ route('certifications.index') }}"><button type="button" class="btn btn-lg btn-danger w-100">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

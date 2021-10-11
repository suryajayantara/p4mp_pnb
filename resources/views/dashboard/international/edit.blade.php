@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">
        {{ Form::model($certificationInternational, array('route' => array('internationals.update', $certificationInternational->id), 'method' => 'PUT')) }}
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fakultas</label>
                <select name="id_faculties" class="form-control mb-3" aria-label="Default select example" required>
                    @foreach ($faculty_data as $faculty)
                        <option value="{{ $faculty->id }}" {{ ( $faculty->id == $certificationInternational->id_faculties) ? 'selected' : '' }}>
                            {{ $faculty->faculty_name }}
                        </option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                <select name="id_study" class="form-control mb-3" aria-label="Default select example" required>
                    @foreach ($departement_data as $departement)
                        <option value="{{ $departement->id }}" {{ ( $departement->id == $certificationInternational->id_study) ? 'selected' : '' }}>
                            {{ $departement->departement_name }}
                        </option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                <select name="level" id="level" class="form-control mb-3" aria-label="Default select example" required>
                    <option >{{ $certificationInternational->level }}</option>
                    <option >d1</option>
                    <option >d2</option>
                    <option >d3</option>
                    <option >s1</option>
                    <option >s2</option>
                    <option >s3</option>
                </select>
                <textarea name="result" class="form-control my-3" placeholder="Masukan Deksripsi Lembaga Akreditasi Disini" id="floatingTextarea2" style="height: 100px" required>{{ $certificationInternational->result }}</textarea>
                <label for="exampleInputEmail1" class="form-label">Negara</label>
                <input name="country" type="Name" value="{{ $certificationInternational->country }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Tanggal Asesmen (Awal)</label>
                <input name="s_assessment" type="date" value="{{ $certificationInternational->s_assessment }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Tanggal Asesmen (Akhir)</label>
                <input name="e_assessment" type="date" value="{{ $certificationInternational->e_assessment }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                <input name="start_date" type="date" value="{{ $certificationInternational->start_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                <input name="end_date" type="date" value="{{ $certificationInternational->end_date }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <button type="submit" class="btn btn-lg btn-success w-100 my-2">Simpan</button>
            {{ Form::close() }}
        <a href="{{ route('internationals.index') }}"><button type="button" class="btn btn-lg btn-danger w-100">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

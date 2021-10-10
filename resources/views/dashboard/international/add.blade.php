@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('internationals.store') }}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                <select name="id_faculties" id="id_faculty" class="form-control mb-3" aria-label="Default select example" required>
                    <option value="" selected>Pilih Fakultas</option>
                    @foreach ($faculty_data as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label">Fakultas</label>
                <select name="id_study" id="id_faculty" class="form-control mb-3" aria-label="Default select example" required>
                    <option value="" selected>Pilih Departemen</option>
                    @foreach ($departement_data as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->departement_name }}</option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                <select name="level" id="level" class="form-control mb-3" aria-label="Default select example" required>
                    <option >d1</option>
                    <option >d2</option>
                    <option >d3</option>
                    <option >s1</option>
                    <option >s2</option>
                    <option >s3</option>
                </select>
                <textarea name="result" class="form-control my-3" placeholder="Masukan Deksripsi Lembaga Akreditasi Disini" id="floatingTextarea2" style="height: 100px" required></textarea>
                <label for="exampleInputEmail1" class="form-label">Negara</label>
                <input name="country" type="Name" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Tanggal Assessment (Awal)</label>
                <input name="s_assessment" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Tanggal Assessment (Akhir)</label>
                <input name="e_assessment" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                <input name="start_date" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                <input name="end_date" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <button type="submit" class="btn btn-lg btn-primary w-100 my-2">Tambah</button>
          </form>
          <a href="{{ route('internationals.index') }}"><button type="button" class="btn btn-lg btn-danger w-100">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('certifications.store') }}" method="post" >
            @csrf
            <div class="m-3">

                {{-- Prodi --}}
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                <select name="id_study" id="id_faculty" class="form-control mb-3  @error('id_study') is-invalid @enderror" aria-label="Default select example" required>
                    @foreach ($data as $items)
                        <option value="{{ $items->id }}">{{ $items->departement_name }}</option>
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
                <select name="level" id="level" class="form-control mb-3 @error('level') is-invalid @enderror" aria-label="Default select example" required>
                    <option value="d1">D1</option>
                    <option value="d2">D2</option>
                    <option value="d3">D3</option>
                    <option value="s1">S1</option>
                    <option value="s2">S2</option>
                    <option value="s3">S3</option>
                </select>
                @error('level')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                
               <div class="form-group row">
                <label for="exampleInputEmail1" class="form-label">Hasil</label>
                <input name="result" type="Name" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>
                
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Awal)</label>
                <input name="start_date" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                
                <label for="exampleInputEmail1" class="form-label">Masa Berlaku (Akhir)</label>
                <input name="end_date" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <button type="submit" class="btn btn-lg btn-primary w-100 my-2">Tambah</button>
          </form>
          <a href="{{ route('certifications.index') }}"><button type="button" class="btn btn-lg btn-danger w-100">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

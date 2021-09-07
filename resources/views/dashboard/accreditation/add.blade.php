@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('accreditations.store') }}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                <select name="id_study" id="id_faculty" class="form-control mb-3" aria-label="Default select example">
                    @foreach ($data as $items)
                    <option value="{{ $items->id }}">{{ $items->departement_name }}</option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label">Jenjang</label>
                <input name="level" type="Name" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                <textarea name="result" class="form-control my-3" placeholder="Masukan Deksripsi Lembaga Akreditasi Disini" id="floatingTextarea2" style="height: 100px"></textarea>
                <input name="start_date" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input name="end_date" type="date" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button type="submit" class="btn btn-lg btn-primary w-100 my-2">Submit</button>
          </form>
          <a href="{{ route('accreditations.index') }}"><button type="button" class="btn btn-lg btn-danger w-100">Kembali</button></a>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
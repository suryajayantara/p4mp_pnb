@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('departements.store') }}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
                <select name="id_faculty" id="id_faculty" class="form-control mb-3" aria-label="Default select example">
                    @foreach ($dats as $items)
                    <option value="{{ $items->id }}">{{ $items->faculty_name }}</option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1" class="form-label">Nama Departement</label>
                <input name="departement_name" type="Name" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
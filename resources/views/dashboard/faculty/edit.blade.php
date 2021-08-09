@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        {{ Form::model($data, array('route' => array('faculties.update', $data->id), 'method' => 'PUT')) }}
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
                <input name="faculty_name" type="Name" value="{{ $data['faculty_name'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <textarea name="desc" class="form-control my-3" placeholder="Masukan Deksripsi Jurusan Disini" id="floatingTextarea2" style="height: 100px">{{ $data['desc'] }}</textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
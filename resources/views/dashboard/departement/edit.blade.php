@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body">

        {{ Form::model($data, array('route' => array('departements.update', $data->id), 'method' => 'PUT')) }}
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
                <select class="form-control" name="id_faculty">
                    @foreach ($dats as $key => $value)
                        <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                            {{ $value }} 
                        </option>
                    @endforeach    
                </select>
                <label for="exampleInputEmail1" class="form-label">Nama Departement</label>
                <input name="departement_name" value="{{ $data['departement_name'] }}" type="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
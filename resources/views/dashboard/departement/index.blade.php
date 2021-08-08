@extends('ui.dashboard')

@section('content')
<div class="row my-5 mx-auto">
    <div class="col-md-10">
        <form>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Departement">
          </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('departements.create') }}" class="btn btn-success">Tambah Data</a>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Jurusan</th>
        <th scope="col">Nama Departemen</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datass as $item)
      <tr>
        <th scope="row">1</th>
        <td>{{ $item->id_faculty }}</td>
        <td>{{ $item->departement_name }}</td>
        <td class="text-center">
            <a href="{{ route('departements.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
            {{ Form::open(array('url' => 'dashboard/departements/' . $item->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Hapus', array('class' => 'btn btn-danger btn-sm')) }}
            {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
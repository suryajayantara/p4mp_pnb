@extends('ui.dashboard')

@section('content')
<div class="row my-5 mx-auto">
    <div class="col-md-10">
        <form>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Akreditasi">
          </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('certifications.create') }}" class="btn btn-success">Tambah Data</a>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Program Studi</th>
        <th scope="col">Jenjang</th>
        <th scope="col">Lembaga Akreditasi</th>
        <th scope="col">Masa Berlaku (Awal)</th>
        <th scope="col">Masa Berlaku (Akhir)</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datas as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->departement_name }}</td>
        <td>{{ $item->level }}</td>
        <td>{{ $item->result }}</td>
        <td>{{ $item->start_date }}</td>
        <td>{{ $item->end_date }}</td>
        <td class="row">
            <div class="mx-1 my-1">
                <a href="{{ route('certifications.edit',$item->id) }}" class="btn btn-sm btn-warning btn-sm">Edit</a>
            </div>
            <div class="mx-1 my-1">
                <form action="{{ route('certifications.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick = "return confirm('Yakin hapus akreditasi?')">Hapus</button>
                </form>
            </div>
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

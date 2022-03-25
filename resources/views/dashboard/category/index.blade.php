@extends('ui.dashboard')

@section('content')

<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
</div> --}}
<!-- Content Row -->
<div class="row my-3 mx-auto">
    {{-- <div class="col-md-10">
        <form action="{{ url()->current() }}" method="GET">
            <div class="input-group mb-3">
                <input name="cari" value="{{ request('cari') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Kategori">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
          </form>
    </div> --}}
    <div class="col-md-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah Kategori</a>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">

        {{-- success --}}
        @if(session('success'))
        <div class="mb-4 mx-2 alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif

        <div class="card shadow mb-4 mx-2">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                {{-- <div class="dropdown no-arrow"> --}}
                    {{-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div> --}}
                {{-- </div> --}}
            </div>
            <!-- Card Body -->

            <div class="card-body my-3">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td> {{ ucwords($category->category_name) }} </td>
                                <td> {{ substr(strip_tags($category->desc),0,30) }}... </td>
                                <td class="row">
                                    <div class="mx-1 my-1">
                                        <a href="{{ route('categories.edit',$category->id) }}"><button class="btn btn-warning">Edit</button></a>
                                    </div>
                                    <div class="mx-1 my-1">
                                        <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick = "return confirm('Yakin hapus kategori?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                  </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

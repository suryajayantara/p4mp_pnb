@extends('ui.dashboard')

@section('content')

<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Posts</h1>
</div> --}}
<!-- Content Row -->
<div class="row my-3 mx-auto">
    <div class="col-md-10">
        <form action="{{ url()->current() }}" method="GET">
          </form>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow mb-4 mx-2">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sejarah</h6>
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
            <div class="card-body">
                <div class="row mb-4">
                    @foreach ($webs as $web)
                        <div class="col-md-12">
                            <a href="/visimisi/edit/{{ $web->id }}" style="float: right"><button class="btn btn-success">Edit</button></a>
                        </div>
                        <div class="col-md-12">
                            <h2 class="display-4">{{ ucwords(str_replace('_', ' ', $web->section)) }}</h2>
                            <p>Tanggal diupload : {{ date_format($web->created_at,"d/m/Y") }}</p>
                            <hr class="mb-5">
                            <p><?= $web->content ?></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    
</div>
  
  
@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
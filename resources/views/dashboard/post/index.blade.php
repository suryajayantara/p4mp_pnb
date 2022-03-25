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
            <div class="input-group mb-3">
                <input name="cari" value="{{ request('cari') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari Berita">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
          </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Tambah Berita</a>
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
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
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



            <div class="card-body my-3">
                <div class="row mb-4">
                    @foreach ($posts as $post)
                        <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-lg" data-aos="flip-left">
                                <img src="{{asset('foto_post')}}/{{ $post->url_photo }}" class="card-img-top" alt="brt-01">
                                <div class="card-body m-2">
                                    <p style="font-size: 11px" class="mb-2">Kategori : {{ ucwords($post->category->category_name) }}</p>
                                    <h5 class="card-title">{{ ucwords($post->title) }}</h5>
                                    <p class="card-text">{{ substr(strip_tags($post->content),0,30) }}...</p>
                                    <a href="{{ route('posts.edit',$post->id) }}"><button class="btn btn-warning w-100 my-2">Edit</button></a>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" onclick = "return confirm('Yakin hapus post?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                  </div>
            </div>
        </div>

</div>


@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection

@extends('ui.dashboard')

@section('content')


        <form action="{{ route('abouts.update',$web->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-lg" data-aos="flip-right">
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <input type="hidden" name="section" id="" value="{{ $web->section }}">
                            <input type="hidden" name="id" id="" value="{{ $web->id }}">
                            <label for="exampleInputEmail1" class="form-label">Isi Sejarah</label>
                            <textarea name="content" class="ckeditor" placeholder="Masukan isi post disini" id="wysiwyg" style="height: 100px" required>{{ $web->content }}</textarea>
                        <button type="submit" class="btn btn-lg w-100 my-2 btn-success">Simpan</button>
                    <a href=""><button type="button" class="btn btn-lg w-100 btn-danger">Kembali</button></a>
                    </div>
                </div>
            </div>
        </form> 
@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
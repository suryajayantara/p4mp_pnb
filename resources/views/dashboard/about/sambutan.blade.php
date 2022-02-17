@extends('ui.dashboard')

@section('content')

<div class="card">
    <div class="card-body"><h3 class="my-3 fw-bolder" style="font-weight: 600"> Sambutan </h3>
        <form action="{{ route('sambutan') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value="visi-misi">
            
            <textarea name="content" class="ckeditor" id="wysiwyg" placeholder="Masukan isi post disini" style="height: 100px" required> <?= $data['text'] ?> </textarea>
            <div class="my-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Pejabat</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Masukan Nama Pejabat" value="<?= $data['name'] ?>">
              </div>
            <button type="submit" class="btn btn-lg w-100 my-2 btn-primary">Tambah</button>
          </form>
    </div>
</div>

@endsection

@section('push')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
@extends('ui.ui')

@section('main')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Detail Berita</h2>
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li>{{ ucwords($post->title) }}</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-lg" data-aos="flip-right">
                        <img src="{{asset('foto_post')}}/{{ $post->url_photo }}" class="card-img" alt="brt-01">
                        <div class="card-body m-3">
                            <p style="font-size: 11px" class="mb-2">Kategori : {{ ucwords($post->category->category_name) }}</p>
                            <h5 class="card-title">{{ ucwords($post->title) }}</h5>
                            <p class="card-text"><?= $post->content ?></p>
                            <a href="{{ route('index') }}" class="btn btn-primary w-100">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
  
    </main><!-- End #main -->

</main><!-- End #main -->
@endsection
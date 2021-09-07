@extends('ui.ui')

@section('main')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Kategori</h2>
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li>{{ ucwords($category) }}</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <section class="inner-page">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-12 col-md-12 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-lg" data-aos="flip-right">
                        <img src="{{asset('foto_post')}}/{{ $post->url_photo }}" class="card-img" alt="brt-01">
                        <div class="card-body m-3">
                            <p style="font-size: 11px" class="mb-2">Kategori : {{ ucwords($post->category->category_name) }}</p>
                            <h5 class="card-title">{{ ucwords($post->title) }}</h5>
                            <p class="card-text">{{ substr(strip_tags($post->content),0,30) }}...</p>
                            <a href="{{ route('detailPosts.show',$post->id) }}" class="btn btn-primary w-100">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      </section>
  
    </main><!-- End #main -->

</main><!-- End #main -->
@endsection
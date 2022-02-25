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
              <li>{{ ucwords($data->category_name) }}</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Berita</h2>
                <h3>Berita <span>Terkini</span></h3>
                <p>Lingkup berita terkini tentang Pendidikan di <span>Politeknik Negeri Bali</span></p>
            </div>

            <div class="row">
                @foreach ($data->post as $post)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-lg" data-aos="flip-right">
                        <img src="{{asset('foto_post')}}/{{ $post->url_photo }}" class="card-img-top" alt="brt-01">
                        <div class="card-body m-3">
                            <p class="badge bg-success" style="font-size: 11px" >{{ ucwords($post->category->category_name) }}  </p>
                            <h5 class="card-title">{{ ucwords($post->title) }}</h5>
                            <p style="font-size: 12px">{{ substr(strip_tags($post->content),0,100) }}...</p>
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

@extends('ui.ui')

@section('main')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Tentang</h2>
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li>Sambutan</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                  <div class="container bg-primary h-full h-100 w-100" style="background-size: cover;background-image: url({{asset($data['img'])}})">
                  </div>
                </div>
                <div class="col-lg-8 col-md-12 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 " data-aos="flip-right">
                        <div class="card-body m-3">
                            <h3 class="card-title">Sambutan</h3>
                           
                            <p class="card-text"><?= $data['text'] ?></p>
                            <h5> {{$data['name']}} </h5>
                            <p>Ketua P4MP Politeknik Negeri Bali</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
  
    </main><!-- End #main -->

</main><!-- End #main -->
@endsection
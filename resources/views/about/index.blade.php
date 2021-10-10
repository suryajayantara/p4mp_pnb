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
              <li>{{ ucwords($section) }}</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <section class="inner-page">
        <div class="container">
            <div class="row">
                @foreach ($sections as $section)
                <div class="col-lg-12 col-md-12 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-lg" data-aos="flip-right">
                        <div class="card-body m-3">
                            <p style="font-size: 11px" class="mb-5">Tanggal Diupload : {{ date_format($section->created_at,"d/m/Y") }}</p>
                            <h3 class="card-title">{{ ucwords(str_replace('_', ' ', $section->section)   ) }}</h3>
                            <p class="card-text"><?= $section->content ?></p>
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
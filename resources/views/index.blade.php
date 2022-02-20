@extends('ui.ui')

@section('main')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <h1>Karena Mutu Adalah <span>Segalanya</span> </h1>
        <h2>Di P4MP, kami menjamin mutu pendidikan Politeknik Negeri Bali secara berkelanjutan</h2>
        <div class="d-flex">
            <a href="#featured-services" class="btn-get-started scrollto">Mari Mulai</a>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-award"></i></div>
                        <h4 class="title"><a href="">Akreditasi</a></h4>
                        <p class="description">Melaksanakan akreditasi setiap Program Studi dan Institusi </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Dokumentasi</a></h4>
                        <p class="description">Medokumentasikan setiap kegiatan Penjaminan Mutu
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-bulb"></i></div>
                        <h4 class="title"><a href="">Mutu</a></h4>
                        <p class="description">Menjaga mutu pendidikan di lembaga secara berkelanjutan</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-line-chart-down"></i></div>
                        <h4 class="title"><a href="">Maju</a></h4>
                        <p class="description">Turut berpartisipasi sebagai tonggak kemajuan lembaga</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Featured Services Section -->


    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Berita</h2>
                <h3>Berita <span>Terkini</span></h3>
                <p>Lingkup berita terkini tentang Pendidikan di <span>Politeknik Negeri Bali</span></p>
            </div>

            <div class="row">
                @foreach ($posts as $post)
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


    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kontak</h2>
                <h3><span>Hubungi Kami</span></h3>
                <p>Memiliki Saran atau pertanyaan ? hubungi kami melalui kontak dibawah.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Alamat Kami</h3>
                        <p>Jalan Raya Bukit Jimbaran</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>p4mp@pnb.ac.id</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6"> 
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Telepon</h3>
                        <p>+62 361 701981</p>
                    </div>
                </div>

            </div>
        </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection

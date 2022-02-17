<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PNB | P4MP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href={{asset('img/favicon.png')}} rel="icon">
  <link href={{asset('img/apple-touch-icon.png')}} rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">



  {{-- Data Tables --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">



  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center shadow">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo"><img src="{{ asset('img/logo.png') }}" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          {{-- Home --}}
          <li><a class="nav-link scrollto active" href="{{ url('/') }}">Beranda</a></li>
          {{-- About --}}
          <li class="dropdown"><a href="#"><span>Tentang P4MP</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/about?section=sambutan">Sambutan Kepala P4MP</a></li>
              <li><a href="/about?section=visi_misi">Visi dan Misi</a></li>
<<<<<<< HEAD
              <li><a href="/about?section=sejarah">SMPI</a></li>
=======
              <li><a href="/about?section=sejarah">SPMI</a></li>
>>>>>>> 84b9c6f577db532cb23bf7607409a00a6911b67f
              <li><a href="{{ url('/document') }}">AMI</a></li>
            </ul>
          </li>
          {{-- Akreditasi --}}
          <li class="dropdown"><a href="#"><span>Akreditasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/certificate') }}">Akreditasi Prodi</a></li>
              <li><a href="#">Akreditasi International</a></li>
            </ul>
          </li>
          {{-- Akreditasi --}}
          <li class="dropdown"><a href="#"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
            {{-- <ul>
              @foreach ($categories as $item)
                <li><a href="/training"> {{$item->category_name}} </a></li>
              @endforeach
            </ul> --}}
          </li>
          <a class="nav-link scrollto text-white btn btn-primary px-3 py-1 m-3" href="{{ url('/login') }}">Login &nbsp;<span class="text-bold ml-2">&#8594;</span> </a>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  @yield('main')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-6 footer-contact">
            <h3>P4MP<span>.</span></h3>
            <p>
              Jl Raya Bukit Jimbaran <br>
              Bukit Jimbaran, Bali 80232<br>
              <strong>Phone:</strong> +62 3617 0198 1<br>
              <strong>Email:</strong> p4mp@pnb.ac.id<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Politeknik Negeri Bali</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset("vendor/aos/aos.js")}}"></script>
  <script src="{{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{asset("vendor/glightbox/js/glightbox.min.js")}}"></script>
  <script src="{{asset("vendor/isotope-layout/isotope.pkgd.min.js")}}"></script>
  <script src="{{asset("vendor/php-email-form/validate.js")}}"></script>
  <script src="{{asset("vendor/purecounter/purecounter.js")}}"></script>
  <script src="{{asset("vendor/swiper/swiper-bundle.min.js")}}"></script>
  <script src="{{asset("vendor/waypoints/noframework.waypoints.js")}}"></script>

  <!-- Template Main JS File -->
  <script src={{asset("js/main.js")}}></script>

  {{-- Data Table Script --}}
  @stack('js')

</body>

</html>

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
              <li><a href="{{ route('indexsambutan') }}">Sambutan Kepala P4MP</a></li>
              <li><a href="{{ route('indexvisimisi') }}">Visi dan Misi</a></li>
              <li><a href="{{ route('indexstruktur') }}">Struktur Organisasi P4MP</a></li>
              <li><a href="{{ route('indexspmi') }}">SPMI</a></li>
              <li><a href="{{ route('indexami') }}">AMI</a></li>
              <li><a href="{{ url('/document') }}">Dokument Mutu</a></li>

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
            <ul>
              @foreach (\App\Models\Category::all() as $item)
                <li><a href="{{ route('category.index',['id' => $item->id]) }}"> {{$item->category_name}} </a></li>
              @endforeach
            </ul>
          </li>
          @if (Auth::check())
          <a class="nav-link scrollto text-white btn btn-primary px-3 py-1 m-3" href="{{ url('/login') }}"> Dashboard </a>
          @else
          <a class="nav-link scrollto text-white btn btn-primary px-3 py-1 m-3" href="{{ url('/login') }}">Login &nbsp;<span class="text-bold ml-2">&#8594;</span> </a>
          @endif
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
              <strong>Telepon:</strong> +62 361 701981<br>
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

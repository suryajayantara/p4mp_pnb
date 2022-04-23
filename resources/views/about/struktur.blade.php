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
              <li>Struktur P4MP PNB</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-lg" data-aos="flip-right">
                        <div class="card-body m-3">
                            <h3 class="card-title">Struktur P4MP PNB</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <th scope="row">1</th>
                                          <td>Dr. Putu Wijaya Sunu, ST.,MT</td>
                                          <td>Ketua Unit</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">2</th>
                                          <td>Ni Ketut Bagiastuti, SH.,M.H.</td>
                                          <td>Sekretaris Merangkap Anggota</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">3</th>
                                          <td>Dr. I Putu Gede Sopan Rahtika, BS, MS</td>
                                          <td>Anggota</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">4</th>
                                          <td>I Putu Yoga Laksana, S.Pd.,M.Pd</td>
                                          <td>Anggota</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">5</th>
                                          <td>I Made Ariana,SE.,M.Si, Ak</td>
                                          <td>Anggota</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">6</th>
                                          <td>Dr. Putu Manik Prihatini, ST.,MT.</td>
                                          <td>Anggota</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">7</th>
                                          <td>Ni Nyoman Sri Astuti, SST.Par.,M.Par.</td>
                                          <td>Anggota</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">8</th>
                                          <td>Kadek Adi Suryawan, ST.,M.Si</td>
                                          <td>Anggota</td>
                                        </tr>
                                    </tbody>
                                  </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

    </main><!-- End #main -->


</main><!-- End #main -->
@endsection

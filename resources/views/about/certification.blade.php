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
              <li>BAN PT / Status Akreditasi Jurusan</li>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Jenjang</th>
                                        <th scope="col">Lembaga Akreditasi</th>
                                        <th scope="col">Masa Berlaku(Awal)</th>
                                        <th scope="col">Masa Berlaku(Akhir)</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
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
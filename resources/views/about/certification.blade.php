@extends('ui.ui')

@section('main')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Sertifikasi</h2>
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li>Akreditasi / Status Akreditasi Program Studi</li>
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
                                    <th scope="col">Hasil Akreditasi</th>
                                    <th scope="col">Masa Berlaku(Awal)</th>
                                    <th scope="col">Masa Berlaku(Akhir)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($certifications as $certificate)
                                    <tr>
                                      <th scope="row">{{ ++$i }}</th>
                                      <td>{{ $certificate->departement->faculty->faculty_name }}{{ $certificate->departement->departement_name }}</td>
                                      <td>{{ $certificate->level->level_name }}</td>
                                      <td>{{ $certificate->institution }}</td>
                                      <td>{{ $certificate->result }}</td>
                                      <td>{{ $certificate->start_date }}</td>
                                      <td>{{ $certificate->end_date }}</td>
                                    </tr>
                                  @endforeach


                                </tbody>
                              </table>
                              <div class="d-flex justify-content-end">
                                {{ $certifications->links() }}
                              </div>
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

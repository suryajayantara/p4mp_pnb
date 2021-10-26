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
              <li>AUN Program Studi</li>
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
                                        <th scope="col">Nama Dokumen</th>
                                        <th scope="col">Diuload Pada Tanggal</th>
                                        <th scope="col">Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($documents as $document)
                                        <tr>
                                          <th scope="row">{{ ++$i }}</th>
                                          <td>{{ $document->title }}</td>
                                          <td>{{ $document->created_at }}</td>
                                          <td><a class="btn btn-primary btn-sm" href="{{route('document.download',['url' => $document->url_file ])}}">Download</a></td>
                                        </tr>
                                      @endforeach


                                    </tbody>
                                  </table>
                                  <div class="d-flex justify-content-end">
                                    {{ $documents->links() }}
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

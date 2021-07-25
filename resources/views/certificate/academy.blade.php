@extends('ui.ui')

@section('main')
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <div class="mb-5">
          <h1 class="display-4"> Sertifikasi Akademik </h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim tempora corrupti recusandae, consectetur vel libero quod unde iste quisquam voluptatum.</p>
        </div>
        <div class="card shadow-lg" data-aos="fade-up">
            <div class="table-responsive" >
              <table class="table table-hover">
                <thead class="table-blue">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>

              {{-- Navigation --}}
              
            </div>
            
        </div>
        <nav aria-label="Page navigation example" class="my-5" data-aos="fade-up">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
  </section><!-- End Portfolio Details Section -->
@endsection
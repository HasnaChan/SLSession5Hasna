@extends('layouts.main')
@section('content')

<section id="project" class="project">
    <div class="container"  data-aos="fade-up" data-aos-duration="4000">

      <div class="section-title">
        <span>My Project</span>
        <h2>My Project</h2>
        <p>Below are several project created by me and my team mates.</p>
      </div>


      <div class="row project-container d-flex justify-content-around" data-aos="fade-up" data-aos-duration="8000">

        <div class="col-lg-4 col-md-4 p-4 rounded-4" data-aos="fade-down" data-aos-duration="10000">
          <div class="project-img"><img src="img/blimanagement.jpg" class="img-fluid" alt=""></div>
          <div class="project-info">
            <h4>Website App</h4>
            <p>BLI Management</p>
            <a href="https://github.com/HasnaChan/blimanagement"  ><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 p-4 rounded-4" data-aos="flip-right" data-aos-duration="6000">
            <div class="project-img"><img src="img/facedec.jpg" class="img-fluid" alt=""></div>
            <div class="project-info">
              <h4>AI Project</h4>
              <p>FaceDec Face Recognition for Attendance</p>
              <a href="https://github.com/HasnaChan/FaceDecProjectAI" ><i class="bx bx-link"></i></a>
            </div>
          </div>

        <div class="col-lg-4 col-md-4 p-4 rounded-4" data-aos="flip-right" data-aos-duration="6000">
            <div class="project-img"><img src="img/fugemy.jpg" class="img-fluid" alt=""></div>
            <div class="project-info">
              <h4>Lab HCI Website Project</h4>
              <p>Fugemy</p>
              <a href="https://github.com/HasnaChan/Chrystalia-Hasna" ><i class="bx bx-link"></i></a>
            </div>
          </div>

          {{-- <div class="mt-5"></div> --}}



          <div class="col-lg-4 col-md-4 p-4 rounded-4" data-aos="flip-left" data-aos-duration="6000">
            <div class="project-img"><img src="img/bokuno.jpg" class="img-fluid" alt=""></div>
            <div class="project-info">
              <h4>Design Portfolio</h4>
              <p>Instagram BokuNoStudioSmg Design Portfolio</p>
              <a href="https://www.instagram.com/bokunostudiosmg/" ><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 p-4 rounded-4" data-aos="flip-left" data-aos-duration="6000">
            <div class="project-img"><img src="img/histopatologi.jpg" class="img-fluid" alt=""></div>
            <div class="project-info">
              <h4>Machine Learning Model</h4>
              <p>Instagram BokuNoStudioSmg Design Portfolio</p>
              <a href="https://github.com/HasnaChan/Histopatology-Detection-Using-CNN-by-AMB1ST" ><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 p-4 rounded-4" data-aos="flip-left" data-aos-duration="6000">
            <div class="project-img"><img src="img/CF.jpg" class="img-fluid" alt=""></div>
            <div class="project-info">
              <h4>Design Portfolio</h4>
              <p>CreativeFabrica BokuNoStudioSmg Design Portfolio</p>
              <a href="https://www.creativefabrica.com/designer/bokunostudiosmg/" ><i class="bx bx-link"></i></a>
            </div>
          </div>

      </div>

    </div>
</section>


<section id="blog" class="blog section-bg">

    <div class="container " data-aos="fade-down" data-aos-duration="4000">
        <div class="col container mt-3 d-flex align-items-center justify-content-around" >
            <div class="section-title">
                <div style=" justify-content:start; width:500px;">
                    <span>My Article</span>
                    <h2 style="font-weight:600;">My Article</h2>
                    <p>Belows are several articles I made in order to complete my task.</p>

                </div>
            </div>
        </div>


        <div class="container row row-md-5 d-flex justify-content-around align-items-center">

            <div class="card mb-3" data-aos="fade-right" data-aos-duration="4000">
                <div class="card-body">
                  <h5 class="card-title"> <a href="https://binus.ac.id/character-building/2023/02/good-netizen/" class="text-decoration-none text-dark">Good Netizen - Character Building</a> </h5>
                  <p class="card-text"><small class="text-muted">February 27 2023</small></p>
                </div>
            </div>
            <div class="card mb-3" data-aos="fade-left" data-aos-duration="4000">
                <div class="card-body">
                  <h5 class="card-title"> <a href="https://binus.ac.id/character-building/2023/01/pengakuan-negara-terhadap-pelanggaran-ham-berat-di-masa-lalu-dalam-perspektif-integrasi-nasional/" style="text-decoration: none; color:black;">Pengakuan Negara terhadap Pelanggaran HAM Berat di Masa Lalu dalam Perspektif Integrasi Nasional</a></h5>
                  <p class="card-text"><small class="text-muted">January 26 2023</small></p>
                </div>
            </div>
            <div class="card mb-3" data-aos="fade-right" data-aos-duration="4000">
                <div class="card-body">
                  <h5 class="card-title"> <a href="https://binus.ac.id/character-building/2022/11/refleksi-sumpah-pemuda-masa-kini-2/" style="text-decoration: none; color:black;">Refleksi Sumpah Pemuda Masa Kini</a></h5>
                  <p class="card-text"><small class="text-muted">November 29 2022</small></p>
                </div>
            </div>

            <div class="card mb-3" data-aos="fade-left" data-aos-duration="4000">
                <div class="card-body">
                  <h5 class="card-title"><a href="https://binus.ac.id/character-building/2022/10/the-dynamics-of-pancasila-democracy/" style="text-decoration:none; color:black;">The Dynamics of Pancasila Democracy</a></h5>
                  <p class="card-text"><small class="text-muted">October 20 2022</small></p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

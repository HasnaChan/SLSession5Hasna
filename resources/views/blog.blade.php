@extends('layouts.main')
@section('content')

<section id="blog" class="blog section-bg">

    <div class="container " data-aos="fade-up" data-aos-duration="4000">
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

            <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title"> <a href="https://binus.ac.id/character-building/2023/02/good-netizen/" class="text-decoration-none text-dark">Good Netizen - Character Building</a> </h5>
                  <p class="card-text"><small class="text-muted">February 27 2023</small></p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title"> <a href="https://binus.ac.id/character-building/2023/01/pengakuan-negara-terhadap-pelanggaran-ham-berat-di-masa-lalu-dalam-perspektif-integrasi-nasional/" style="text-decoration: none; color:black;">Pengakuan Negara terhadap Pelanggaran HAM Berat di Masa Lalu dalam Perspektif Integrasi Nasional</a></h5>
                  <p class="card-text"><small class="text-muted">January 26 2023</small></p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title"> <a href="https://binus.ac.id/character-building/2022/11/refleksi-sumpah-pemuda-masa-kini-2/" style="text-decoration: none; color:black;">Refleksi Sumpah Pemuda Masa Kini</a></h5>
                  <p class="card-text"><small class="text-muted">November 29 2022</small></p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title"><a href="https://binus.ac.id/character-building/2022/10/the-dynamics-of-pancasila-democracy/" style="text-decoration:none; color:black;">The Dynamics of Pancasila Democracy</a></h5>
                  <p class="card-text"><small class="text-muted">October 20 2022</small></p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

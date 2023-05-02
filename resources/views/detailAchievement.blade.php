@extends('layouts.main')
@section('content')
<section id="achievementDetail" class="achievementDetail">
    <div class="container"  data-aos="fade-up" data-aos-duration="4000">

        <div class="section-title">
            <span>My Achievement Detail</span>
            <h2>My Achievement Detail</h2>
        </div>

        <div class="row" style="color:
        {{ $achievement["rankid"] == "C"? 'rgb(218,165,32)' : '' }}
        {{ $achievement["rankid"] == "R"? 'rgb(192,192,192)' : '' }}
        {{ $achievement["rankid"] == "S"? 'rgb(222,184,135)' : '' }}
        ">
            <div class="image col-lg-4 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-duration="4000">
                <img src="{{ asset('img/' . $achievement['image']) }}" class="card-img-top " alt=""  style="width:26vw; height:16vw;">
            </div>
            <div class="col-lg-8 d-flex flex-column align-items-stretch">
            <div class="content ps-lg-4 d-flex flex-column justify-content-center" >
                <div class="row" data-aos="flip-left" data-aos-duration="4000">
                  <div class="col">
                    <ul>
                      <li><i class="bi bi-chevron-right"></i> <strong style="width:150px; "  >Name:</strong> <span> {{ $achievement['name'] }}</span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong style="width:150px; "  >Winning Status: </strong> <span> {{ $achievement['rank'] }}</span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong style="width:150px; "  >Level: </strong> <span> {{ $achievement['level'] }}</span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong >Description: </strong> <span style="margin-left:60px; "> {{ $achievement['desc'] }}</span></li>
                    </ul>
                  </div>
                </div>
            </div>

            </div>
        </div>


    </div>
</section>
@endsection

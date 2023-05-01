@extends('layouts.main')
@section('content')

<section id="achievement">

    <div class="container"  data-aos="fade-up" data-aos-duration="4000">
            <div class="section-title">
                <span>My Achievements</span>
                <h2>My Achievements</h2>
                <p>Since Taekwondo and Debate are my hobbies, here are some achievements I received:</p>
            </div>

            <div class="container">

                <div class="row row-md-4 pt-5 text-center justify-content-around" >
                    @foreach($achievements as $achievement)
                    <div class="col-lg-4 col-md-4 p-4 rounded-4" data-aos="fade-down" data-aos-duration="10000">
                        <div class="d-flex project-img " style="width:26vw; height:16vw;" data-aos="flip-left" data-aos-duration="10000"><img src="{{ asset('img/' . $achievement['image']) }}" class="d-flex align-items-center justify-content-center" alt=""></div>
                        <div class="project-info mt-2" style="color:
                        {{ $achievement["rankid"] == "C"? 'rgb(218,165,32)' : '' }}
                        {{ $achievement["rankid"] == "R"? 'rgb(192,192,192)' : '' }}
                        {{ $achievement["rankid"] == "S"? 'rgb(222,184,135)' : '' }}
                    ">
                            <h5 class="card-title">Name: {{ $achievement['name'] }}</h5>
                            <h6 class="card-text">Winning Status: {{ $achievement['rank'] }}</h6>
                            <h6 class="card-text">Winning ID: {{ $achievement['rankid'] }}</h6>
                            <h6 class="card-text">Level: {{ $achievement['level'] }}</h6>
                            <a href="achievement/{{ $achievement['id'] }}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>


                    @endforeach


                </div>


            </div>
    </div>


</section>
@endsection

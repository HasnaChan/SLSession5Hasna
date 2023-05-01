@extends('layouts.main')
@section('content')

<section id="achievementDetail">
    <div class="container"  data-aos="fade-up" data-aos-duration="4000">
        <div class="section-title">
            <span>My Achievement Detail</span>
            <h2>My Achievement Detail</h2>
            <p>Here is the detail of my achievement:</p>
        </div>

        <div class="container">
            <div class="d-flex row row-md-4 pt-5 text-center justify-content-around" >
                <div class="card {{ $achievement["rankid"] }} justify-content-around flex flex-row"style="width:26vw;" >
                    <img src="{{ asset('img/' . $achievement['image']) }}" class="card-img-top " alt=""  style="width:26vw; height:16vw;">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $achievement['name'] }}</h5>
                        <h6 class="card-text">Winning Status: {{ $achievement['rank'] }}</h6>
                        <h6 class="card-text">Level: {{ $achievement['level'] }}</h6>
                        <h5 class="card-title">Description:</h5>
                        <h6 class="card-text">{{ $achievement['desc'] }}</h6>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>
@endsection

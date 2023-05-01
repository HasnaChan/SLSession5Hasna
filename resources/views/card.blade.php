@extends('layouts.main')

@section('content')

<div class="container pb-5 " >
    <div class="row row-md-4 text-center justify-content-around" >
        <h1>All Products</h1>
    </div>
</div>

<div class="container">

        <div class="row row-md-4 pt-5 text-center justify-content-around" >
            @foreach($cards as $card)
                <div class="card col-md-5 {{ $card["StatusProduct"] }}" >
                        <img class="card-img-top m-5" src="{{ asset('img/' . $card['image']) }}"
                        alt="{{ $card['ProductName'] }}" style="width:200px">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{ $card['ProductName'] }}</h5>
                            <h6 class="card-text">Status: {{ $card['StatusProduct'] }}</h6>
                            <h6 class="card-text">Price: {{ $card['ProductPrice'] }}</h6>
                            <a href="card/{{ $card['id'] }}" class="btn btn-primary">See Detail</a>
                        </div>
                </div>
            @endforeach
        </div>


</div>


@endsection

{{--

<div class="row justify-content-center">
    <div class="col-4 col-md-4 text-center">
        @foreach ($cards as $kartu)
        @if($kartu['StatusProduct'] === 'R'){
            <div class="card R">
                <img class="card-img-top" src="{{ asset('img/' . $kartu['image']) }}"
                alt="{{ $kartu['ProductName'] }}">
                <div class="card-body">
                    <h2 class="card-title">{{ $kartu['ProductName'] }}</h2>
                    <h3 class="card-text">{{ $kartu['StatusProduct'] }}</h3>
                    <h3 class="card-text">{{ $kartu['ProductPrice'] }}</h3>
                    <a href="/Detail" class="btn btn-primary">See Detail</a>
                </div>
            </div>
        }
        @elseif($kartu['StatusProduct'] ==='SR'){
            <div class="card SR ">
                <img class="card-img-top" src="{{ asset('img/' . $kartu['image']) }}"
                alt="{{ $kartu['ProductName'] }}">
                <div class="card-body">
                    <h2 class="card-title">{{ $kartu['ProductName'] }}</h2>
                    <h3 class="card-text">{{ $kartu['StatusProduct'] }}</h3>
                    <h3 class="card-text">{{ $kartu['ProductPrice'] }}</h3>
                    <a href="/Detail" class="btn btn-primary">See Detail</a>
                </div>
            </div>
        }
        @elseif($kartu['StatusProduct'] ==='SSR'){
            <div class="card SSR">
                <img class="card-img-top" src="{{ asset('img/' . $kartu['image']) }}"
                alt="{{ $kartu['ProductName'] }}">
                <div class="card-body">
                    <h2 class="card-title">{{ $kartu['ProductName'] }}</h2>
                    <h3 class="card-text">{{ $kartu['StatusProduct'] }}</h3>
                    <h3 class="card-text">{{ $kartu['ProductPrice'] }}</h3>
                    <a href="/Detail" class="btn btn-primary">See Detail</a>
                </div>
            </div>
        }
        @endif
        @endforeach
    </div>
</div>

--}}

@extends('layouts.master')

@section('title')
    <title>Home</title>
@endsection

@section('content')
    <div class="col-12">
        <div class="card text-bg-dark bg-dark">
            <img src="{{ asset('img/coding.jpg') }}" class="card-img" alt="..." width="100%" height="350px">
            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                <h3 class="card-title jersey_font text-white">Explore Coding The Easy and Fun Way</h3> <br>
                <h5 class="card-text jersey_font text-white">CodeBridge is designed to help anyone learn</h5> <br>
                <h5 class="card-text jersey_font text-white">coding in a simple, enjoyable, and stressfree manner</h5> <br>
            </div>
        </div>
        <div class="bg-dark">

        </div>
    </div>
@endsection

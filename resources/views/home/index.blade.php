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
        <div class="container mt-3">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $course->logo }}" class="card-img-top" alt="Course Logo">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                <a href="" class="btn btn-primary">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="" class="btn btn-outline-primary btn-lg">View All Courses</a>
            </div>
        </div>
        
    </div>
@endsection

@extends('layout')
@section('content')
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/images/slider1.jpg') }}" class="d-block w-100"
                     alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/images/slider2.jpg') }}" class="d-block w-100"
                     alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/images/slider3.jpg') }}" class="d-block w-100"
                     alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection

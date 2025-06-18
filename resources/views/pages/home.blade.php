@extends('layout')

@section('content')
<div class="home container-fluid d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-12 col-md-6 d-flex justify-content-center text-center text-md-start mb-4 mb-md-0">
            <h1 class="trendy-text">Trendy Shoes for Men</h1>
        </div>

        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <div class="shoe-frame">
                <div class="border-box"></div>
                <img src="{{ asset('img/bg.png') }}" alt="Shoes" class="shoe-img">
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Bienvenido a ' . config('app.name'))

@section('body-class', 'landing-page')

@section('styles')

@endsection

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="row text-white">
            <div class="col-md-12">
                {{-- <img src="{{ asset('/img/logo.png') }}" alt="Distribuidora Necochea Día" width="300"> --}}
                <h1>Bienvenidos a Take Away Cabo Largo</h1>
                <h4>Realiza pedidos en línea </h4>
                {{--<br />--}}
                {{--<a href="#" class="btn btn-danger btn-raised btn-lg">--}}
                    {{--<i class="fa fa-play"></i> ¿Cómo funciona?--}}
                {{--</a>--}}
            </div>
        </div>

        <hr>

        <div class="row text-white">
            <div class="container">

                <div class="section text-center">
                    <h2 class="title">Nuestros productos</h2>
                    <p>&nbsp;</p>
                    <div class="row d-flex justify-content-center">
                        <div class="row">

                            @foreach ($categories as $category)
                                <a href="{{ url('/categories/'.$category->id) }}">
                                    <div class="card text-center m-1 t-black">
                                        <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}"  width="250" class="m-1">
                                        <div class="card-body">
                                            <h4 class="title">{{ $category->name }}</h4>
                                            <p class="description">{{ $category->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
@endsection

@section('scripts')

@endsection

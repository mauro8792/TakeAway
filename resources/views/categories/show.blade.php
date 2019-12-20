@extends('layouts.app')

@section('body-class', 'profile-page')

@section('styles')

@endsection

@section('content')


        <div class="container div_trans8 corner4 mt-4 mb-4 p-4 text-white">
            <div class="row">
                <div class="col-md-12">
                    @if (session('notification'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('notification') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="d-flex justify-content-center">
                        <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-fluid mx-auto d-block" width="150px">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white">{{ $category->name }}</h3>
                    </div>

                    <div class="text-center">
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="row d-flex justify-content-center">
                    @foreach ($products as $product)
                            <div class="card text-center m-1 t-black">
                                <img src="{{ $product->featured_image_url }}" alt="Imagen {{ $product->name }}"  width="250" class="m-1 text-center">
                                <div class="card-body">
                                    <h4 class="title">{{ $product->name }}</h4>
                                    <p class="">{{ $product->description }}</p>
                                    <h3 class="">@if($product->price>0)$@endif{{ $product->price }}</h3>
                                </div>
                                <div class="text-center">
                                    @if (auth()->check())
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddToCart{{$product->id}}">Añadir al carrito de compras</button>
                                    @else
                                        <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary">Añadir al carrito de compras</a>
                                    @endif
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                                    <!-- Modal -->
                                    <div class="modal fade t-black text-center" id="modalAddToCart{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalAddToCart{{$product->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="{{ url('/cart') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <div class="modal-header text-center">

                                                    <h5 class="modal-title" id="modalAddToCart{{$product->id}}Title">Agregar Producto al Carro de Compras</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-thumbnail">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>{{ $product->name}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>{{ $product->description}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h2 class="t-blue">@if($product->price>0)$@endif{{ $product->price}}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <label class=" t-black" id="myModalLabel">Seleccione la cantidad que desea agregar</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="quantity" value="1" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Fin Modal -->
                    @endforeach
                </div>
            </div>
        </div>
    <p>&nbsp;</p>

@endsection

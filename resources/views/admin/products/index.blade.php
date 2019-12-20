@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="section text-center text-white">
            <h2 class="title">Listado de productos</h2>
            <p>&nbsp;</p>
            <div class="">
                <div class="text-center">
                    <p><a href="{{ url('/admin/products/create') }}" class="btn btn-info btn-round">Nuevo producto</a></p>
                    <div class="row table-responsive-sm">
                        @if(count($products)>0)
                            <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th class="text-center" width="25%">Nombre</th>
                                    <th class="text-center" width="60%">Descripción</th>
                                    <th class="text-center">Categoría</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center" width="13%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="text-left">{{ $product->name }}</td>
                                    <td class="text-left">{{ $product->description }}</td>
                                    <td class="text-left">{{ $product->category_name }}</td>
                                    <td class="text-right">@if($product->price>0)$@endif {{ $product->price }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" target="_blank"><i class="fa fa-info font20 t-yellow"></i>&nbsp;</a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto"><i class="fa fa-edit font20 t-blue"></i>&nbsp;</a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del producto"><i class="fa fa-image font20 t-white"></i>&nbsp;</a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/del') }}" rel="tooltip" title="Eliminar del producto"><i class="fa fa-times font20 t-red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div class="container">
                        {{ $products->links() }}
                    </div>
                        @else
                            <h4>No hay productos cargados</h4>
                        @endif
                </div>
            </div>
        </div>
    </div>
 </div>
        <p>&nbsp;</p>


@endsection

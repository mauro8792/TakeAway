@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')


    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="section text-center text-white">
            <h2 class="">Listado de categorías</h2>
            <p>&nbsp;</p>
            <div class="">
                <div class="text-center">
                    <p><a href="{{ url('/admin/categories/create') }}" class="btn btn-info btn-round">Nueva categoría</a></p>
                    <div class="row table-responsive-sm">
                        @if(count($categories)>0)
                        <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th class="text-center" width="25%">Nombre</th>
                                    <th class="text-center" width="60%">Descripción</th>
                                    <th>Imagen</th>
                                    <th class="text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td class="text-left">{{ $category->name }}</td>
                                    <td class="text-left">{{ $category->description }}</td>
                                    <td class="text-center"><img src="{{ $category->featured_image_url }}" height="50"></td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría"><i class="fa fa-edit font20"></i></a>
                                        <a href="{{ url('/admin/categories/'.$category->id.'/del') }}" rel="tooltip" title="Eliminar categoría"><i class="fa fa-times font20 t-red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="container">
                            {{ $categories->links() }}
                        </div>
                        @else
                            <h4>No hay categorias cargadas</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>


@endsection

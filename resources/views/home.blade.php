@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">

        <div class="section text-white">
            <h2 class="title text-center">Panel de compras</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

            <p>
                <a href="#dashboard" role="tab" data-toggle="tab" class="btn btn-outline-info">Carrito de compras</a>
                <a href="#tasks" role="tab" data-toggle="tab" class="btn btn-outline-warning">Pedidos realizados</a>
            </p>

            <hr>
            <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>

            <table class="table t-white">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>SubTotal</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->cart->details as $detail)
                    <tr>
                        <td class="text-center">
                            <img src="{{ $detail->product->featured_image_url }}" height="50">
                        </td>
                        <td><a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" class="t-white-link">{{ $detail->product->name }}</a></td>
                        <td>$ {{ $detail->product->price }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>$ {{ $detail->quantity * $detail->product->price }}</td>
                        <td class="t-white">
                            <form method="post" action="{{ url('/cart') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto"><i class="fa fa-info font20"></i></a>&nbsp;
                                <a href="{{ url('/products/'.$detail->product->id.'/del') }}" rel="tooltip" title="Eliminar producto"><i class="fa fa-times font16 t-red"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(auth()->user()->cart->total>0)
            <h4>Importe a pagar: ${{ auth()->user()->cart->total }}</h4>

            <div class="text-center">
                <form method="post" action="{{ url('/order') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-round">Realizar pedido</button>
                </form>
            </div>
            @endif
        </div>

    </div>
    <p>&nbsp;</p>
@endsection

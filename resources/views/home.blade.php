@extends('layouts.app')

@section('body-class', 'product-page')
 
@section('tittle', 'app venta | Dashboard')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">


<div class="section">
    <h2 class="title text-center">Dashboard</h2>


    
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif

    <ul class="nav nav-pills nav-pills-primary" role="tablist">
        <li class="active">
            <a href="#dashboard" role="tab" data-toggle="tab">
                <i class="material-icons">dashboard</i>
                Carrito de compras
            </a>
        </li>
        
        <li>
            <a href="#tasks" role="tab" data-toggle="tab">
                <i class="material-icons">list</i>
                Pedidos realizados
            </a>
        </li>
    </ul>
    <hr>
    
     <p class="text-center">Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos.</p>
     <hr>

<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nombre </th>
            <th >Precios</th>
            <th >Cantidad</th>
            <th >Subtotal</th>
            <th >Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach (auth()->user()->cart->details as $detailHm)
        <tr>
            <td class="text-center">
                </a><img src="{{$detailHm->product->featured_image_url}}" height="60">
            </td>
            <td><a href="{{url('/products/'.$detailHm->product->id)}}" target="_blank">{{$detailHm->product->name}}</td>
            <td >$ {{$detailHm->product->price}}</td>
            <td>{{$detailHm->quantity}}</td>
            <td>$ {{$detailHm->quantity * $detailHm->product->price}}</td>
            <td class="td-actions text-right">
                
                <form method="post" action="{{url('/cart')}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="cart_detail_id" value="{{$detailHm->id}}">

                <a href="{{url('/products/'.$detailHm->product->id)}}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                    <i class="fa fa-info"></i>
                </a>

                <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                    <i class="fa fa-times"></i>
                </button>

                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 

<p>
    <strong>Total a pagar :</strong> {{ auth()->user()->cart->total }}
</p>
<div class="text-center">
    <form action="{{url('/order')}}" method="post">
        {{csrf_field()}}
        <button class="btn btn-primary btn-round">
            <i class="material-icons">done</i> Realizar pepido
        </button>
    </form>
</div>
</div>


</div>

</div>

<!-- de esta forma llamamos el includ de unfooter dice que esta dentro de la carpeta includes hay un archivo llamado footer  -->
@include('includes.footer')

@endsection








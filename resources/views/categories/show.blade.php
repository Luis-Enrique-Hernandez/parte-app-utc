@extends('layouts.app')

@section('body-class', 'profile-page')
 
@section('tittle', 'app venta | Dashboard')

@section('styles')
<style>
    .team{
        padding-bottom: 50px;
    }
    .team .rows .col-md-4{
        margin-bottom: 5em;
    }
    .rows{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;

    }
    .row > [class*='col-']{
        display: flex;
        flex-direction: column;
    }
</style>
@endsection

@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{$category->featured_image_url}}" alt="Imagen representativa de la categoria {{$category->name}}" class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name text-center">
                        <h3 class="title">{{$category->name}}</h3>
                    </div>
                            @if (session('notification'))
                                        <div class="alert alert-success">
                                            {{ session('notification') }}
                                        </div>
                            @endif
                            </div>
            </div> 
                
                
            <div class="description text-center">
                <p>{{$category->description}} </p>
            </div>


    <div class="team text-center">
        <div class="rows">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="team-player">
                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                    <h4 class="title">
                        <a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a>

                       
                    </h4>
                    <p class="description">{{$product->description}}</p>
                    
                </div>
            </div>
            @endforeach            
        </div>
        <div class="text-center">
            {{$products->links()}}            
        </div>
    </div>
    

               
        </div>
    </div>
</div>






<!-- Cuerpo de la Modal
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Selecciona la cantidad que deseas agregar</h4>
      </div>
      <form action="{{url('/cart')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="product_id" value="">
          <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
          </div>
      </form> -->
      
   <!--  </div>
     </div>
   </div> -->


<!-- de esta forma llamamos el includ de unfooter dice que esta dentro de la carpeta includes hay un archivo llamado footer  -->
@include('includes.footer')

@endsection








@extends('layouts.app')

@section('body-class', 'profile-page')
 
@section('tittle', 'app venta | Dashboard')

@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
<div class="profile-content">
<div class="container">
    <div class="row">
        <div class="profile">
            <div class="avatar">
                <img src="{{$productHm->featured_image_url}}" alt="Circle Image" class="img-circle img-responsive img-raised">
            </div>


            <div class="name">
                <h3 class="title">{{$productHm->name}}</h3>
                <h6>{{$productHm->category_name}}</h6>
            </div>
                    @if (session('notification'))
                                <div class="alert alert-success">
                                    {{ session('notification') }}
                                </div>
                    @endif
        </div>
    </div>
    <div class="description text-center">
        <p>{{$productHm->long_description}} </p>
    </div>

    
    <div class="text-center">
        @if (auth()->check())
    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
        <i class="material-icons">add</i> Añadir a carrito de compras
    </button>

    @else
    <a href="{{url('/login?redirect_to='.url()->current())}}" class="btn btn-primary btn-round">
        <i class="material-icons">add</i> Añadir a carrito de compras
    </a>
    @endif
    </div>
    

   

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="profile-tabs">
                <div class="nav-align-center">
                    

                    <div class="tab-content gallery">
                        <div class="tab-pane active" id="studio">
                            <div class="row">
                                <div class="col-md-6">
                                    @foreach ($imagesLeft as $images)
                                    <img src="{{$images->url}}" class="img-rounded" />
                                    @endforeach                               
                                </div>
                                <div class="col-md-6">
                                    @foreach ($imagesRigth as $images)
                                    <img src="{{$images->url}}" class="img-rounded" />
                                    @endforeach 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Profile Tabs -->
        </div>
    </div>

</div>
</div>
</div>





<!-- Cuerpo de la Modal -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Selecciona la cantidad que deseas agregar</h4>
      </div>
      <form action="{{url('/cart')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="product_id" value="{{$productHm->id}}">
          <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
          </div>
      </form>
      
    </div>
  </div>
</div>


<!-- de esta forma llamamos el includ de unfooter dice que esta dentro de la carpeta includes hay un archivo llamado footer  -->
@include('includes.footer')

@endsection








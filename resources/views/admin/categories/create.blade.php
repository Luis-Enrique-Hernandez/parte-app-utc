@extends('layouts.app')

@section('body-class', 'product-page')
 
@section('tittle', 'Bienvenido a app venta')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">


<div class="section">
    <h2 class="title text-center">Registrar nuevas categorias</h2>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        
    </div>
    @endif
    <form method="post" action="{{url('/admin/categories')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

    <div class="row">    
        <div class="col-sm-6">
            <div class="form-group label-floating">
                <label class="control-label">Nombre de la categoria</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-sm-6">
                <label class="control-label">Imagenes de la categoria</label>
                <input type="file" name="image" >
        </div>
    </div>


       
            <div class="form-group label-floating">
                <label class="control-label">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>       
            
       
            
            <button class="btn btn-primary">Registrar</button>
        
    </form>
</div>


</div>

</div>

<!-- de esta forma llamamos el includ de unfooter dice que esta dentro de la carpeta includes hay un archivo llamado footer  -->

@include('includes.footer')

@endsection

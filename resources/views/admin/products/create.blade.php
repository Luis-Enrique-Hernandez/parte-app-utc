@extends('layouts.app')

@section('body-class', 'product-page')
 
@section('tittle', 'Bienvenido a app venta')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">


<div class="section">
    <h2 class="title text-center">Registrar nuevos productos</h2>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        
    </div>
    @endif
    <form method="post" action="{{url('/admin/products')}}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                </div>
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Precio</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-sm-6">       
            <div class="form-group label-floating">
                <label class="control-label">Descripcion corta</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div> 
            </div>

            <div class="col-sm-6">       
            <div class="form-group label-floating">
                <label class="control-label">Categoria</label>
                <select name="category_id" id="" class="form-control">
                    <option value="0">General</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div> 
            </div>            
        </div>
         <textarea class="form-control" name="long_description" placeholder="Descripcion extensa" rows="5">{{ old('long_description') }}</textarea>
            
            <button class="btn btn-primary">Registrar</button>
        
    </form>
</div>


</div>

</div>

<!-- de esta forma llamamos el includ de unfooter dice que esta dentro de la carpeta includes hay un archivo llamado footer  -->

@include('includes.footer')

@endsection

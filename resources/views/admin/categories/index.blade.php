@extends('layouts.app')

@section('body-class', 'hernandez-page')

@section('tittle', 'Listados de categorias')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">


<div class="section text-center">
    <h2 class="title">Listados de categorias</h2>

    <div class="team">
        <div class="row">
            <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nueva categoria</a>
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="col-md-2 text-center">Nombre </th>
            <th class="col-md-5 text-center">Descripcion</th>
            <th>Imagen</th>
            <th class="text-right">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categoriesindex as $key => $category)
        <tr>
            <td class="text-center">{{$key+1}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <img src="{{$category->featured_image_url}}" height="50" alt="">
            </td>
                        
             <td class="td-actions text-right">
                
                <form method="post" action="{{url('/admin/categories/'.$category->id)}}">
                    {{ csrf_field() }}

                <a href="#" rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                    <i class="fa fa-info"></i>
                </a>

                <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                    <i class="fa fa-edit"></i>
                </a>

                <!-- <a href="{{url('/admin/categories/'.$category->id.'/images')}}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                    <i class="fa fa-image"></i>
                </a> -->

                    {{ method_field('DELETE') }}
                <button type="submit" rel="tooltip" title="Eliminar categoria" class="btn btn-danger btn-simple btn-xs">
                    <i class="fa fa-times"></i>
                </button>

                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>  
{{$categoriesindex->links()}}         
        </div>
    </div>

</div>



</div>

</div>

<!-- de esta forma llamamos el includ de unfooter dice que esta dentro de la carpeta includes hay un archivo llamado footer  -->
@include('includes.footer')

@endsection

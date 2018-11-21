@extends('layouts.app')
@section('body-class', 'signup-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
<div class="container">
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="card card-signup">
            <form class="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="header header-primary text-center">
                    <h4>Inicio de sesiòn</h4>
                    <div class="social-line">
                        <!-- <a href="#pablo" class="btn btn-simple btn-just-icon">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                            <i class="fa fa-google-plus"></i>
                        </a> -->
                    </div>
                </div>
                <p class="text-divider">Ingresar datos</p>
                <div class="content">

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="email...">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                        <input  id="password" type="password" class="form-control" name="password" required placeholder="Password..."  />
                    </div>

                   
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                            Recordar sesiòn
                        </label>
                    </div>
                </div>
                <div class="footer text-center">
                    <button type="submit" href="#pablo" class="btn btn-simple btn-primary btn-lg">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- de esta forma llamamos el includ de unfooter dice que esta dentro de la carpeta includes hay un archivo llamado footer  -->
@include('includes.footer')

</div>
@endsection

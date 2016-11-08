<!DOCTYPE html>
<html lang="pt">
    <head>
        @include('head')
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>Sua Ideia</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 grid-form">
                    <img src="img/suaideia.png" class="img-fluid logo" alt="Sua Ideia" title="Sua Ideia">
                    <form class="form-control" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="nickname" class="form-control" id="nickname" name="nickname" placeholder="Nickname" required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="true">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <br /><br />
                        <a href="{{ url('registrar') }}">Não possui conta?</a>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger errors">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if (!empty($message)) 
                            <div class="alert alert-danger">{{ $message }}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
    
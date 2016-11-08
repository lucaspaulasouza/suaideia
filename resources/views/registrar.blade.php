<!DOCTYPE html>
<html lang="pt">
    <head>
        @include('head')
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>Sua Ideia</title>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#confirm_password').on('keyup',function(event) {
                    if($('#password').val() != $('#confirm_password').val()) {
                        $('#confirm_password').get(0).setCustomValidity("Senha de confirmação está diferente!");
                    } else {
                        $('#confirm_password').get(0).setCustomValidity('');
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 grid-form">
                    <img src="img/suaideia.png" class="img-fluid logo" alt="Sua Ideia" title="Sua Ideia">
                    <form class="form-control" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nickname" minlength="3" required="true">
                        </div>                        
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="6" required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Confirm Password" minlength="6" required="true">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger errors">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        
                        @if (!empty($message)) 
                            <div class="alert alert-danger errors">{{ $message }}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
    
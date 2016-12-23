
  <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador | Entrar</title>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/dist/css/animate.css" rel="stylesheet">
    <link href="/dist/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img src="/img/logo.png"></h1>

            </div>
            <h3>Bienvenido administrador</h3>
            
            <p>Ingresa tus datos.</p>
            
                   <form method="POST" action="{{url('/login')  }}"  class="m-t">
    {!! csrf_field() !!}
        
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 





                <div class="form-group">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Usuario@ejemplo.app" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password"
                placeholder="***********">

                       

                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>

               
            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/dist/js/jquery-2.1.1.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>

</body>

</html>

<form method="POST" action="/web/public/auth/register">
    {!! csrf_field() !!}

    <div>
        Nombre
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
       Correo electronico
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        contraseña
        <input type="password" name="password">
    </div>

    <div>
       Confirma tu contraseña
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Registrar</button>
    </div>
</form>
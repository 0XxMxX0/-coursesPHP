@if($mensagem = Session::get('error'))
    {{$mensagem}}
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif

<form action="{{route('login.auth')}}" method="post">
@csrf

    Email: <br><input type="email" value="email" name="email">
    <br>
    Senha: <br><input type="password" name="password">
    <input type="checkbox" name="remember"> Lembrar-me
    <br>
    <button type="submit" class="btn success">Efetuar Login</button>
</form>

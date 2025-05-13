<!-- filepath: resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
</head>
<body>
    
<div class="container">
    <h1>Panel de Administrador</h1>
    <p>Bienvenido, {{ Auth::user()->first_name }}.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <ul>
        <li><a href="{{ route('user.index') }}">Ver usuarios</a></li>
        <li><a href="{{ route('barbers.index') }}">Ver barberos</a></li>
        <li><a href="{{ route('crud.index') }}">Crud</a></li>    
        <!-- Agrega más enlaces según lo que quieras administrar -->
    </ul>
</div>

</body>
</html>

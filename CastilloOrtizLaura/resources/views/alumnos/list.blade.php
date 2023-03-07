<!DOCTYPE html>
<html>

<head>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
</head>
<body>

<h2>HTML Table</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $a)
        <tr>
            <td>{{$a->alumno_id}}</td>
            <td>{{$a->nombre_alumno}}</td>
            <td>{{$a->apellidos_alumno}}</td>
            <td>{{$a->email_alumno}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    <form action="{{route('alumno.store_modulo',$modulo->id)}}" method="POST">
    @csrf
    
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" placeholder="Laura"><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" placeholder="Castillo Ortiz"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="email@example.com"><br><br>
    
        <input type="submit" value="Enviar">
    </form> 
</div>
</body>

</html>
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
            <td>{{$a->id}}</td>
            <td>{{$a->nombre}}</td>
            <td>{{$a->apellidos}}</td>
            <td>{{$a->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <form action="{{ route('ordenes.import.excel') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            {{-- Token de seguridad --}}
            @csrf

            <input type="file" name="file" id="file">
            <button type="submit" class="btn btn-md btn-success">Importar Ordenes de Trabajo</button>
        </form>
    </body>

</html>
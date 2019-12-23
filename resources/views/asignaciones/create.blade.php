<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Template CSS -->
        <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('glyphicons-pro/css/glyphicons-pro.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

        <style>
            .input-group-addon {
                padding: .375rem .75rem;
                margin-bottom: 0;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                text-align: center;
                background-color: #e9ecef;
                border: 1px solid #ced4da;
            }
        </style>
        <title>Asignación Ordenes de Trabajo</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h1>Asignación Ordenes de Trabajo - Registro</h1>
            </div>
            @include('partials/errors')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('asignaciones.store') }}" method="post" autocomplete="off">
                        {{-- Token de seguridad --}}
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Información Básica
                            </div>
                            <div class="card-body">
                                {{-- Orden de trabajo --}}
                                <div class="form-group">
                                    <label for="orden_id">Nro. Orden de Trabajo del solicitante:</label>
                                    <select name="orden_id" id="orden_id" class="form-control">
                                        <option value="">Seleccione&hellip;</option>
                                        @foreach ($ordenes as $orden)
                                        <option value="{{ $orden->id }}"
                                            {{ old('orden_id', $asignacion->orden_id ?? '') == $orden->id ? 'selected' : '' }}>
                                            {{ $orden->numOrden }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Usuario --}}
                                <div class="form-group">
                                    <label for="user_id">Asignar a empleado:</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Seleccione&hellip;</option>
                                        @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}"
                                            {{ old('user_id', $asignacion->user_id ?? '') == $usuario->id ? 'selected' : '' }}>
                                            {{ $usuario->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Guardar</button>
                            <button type="button" class="btn btn-md btn-warning"
                                onclick="window.location='{{ route('asignaciones.index') }}'">Cancelar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                
            });
        </script>
    </body>

</html>
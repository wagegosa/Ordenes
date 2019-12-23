<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <title>Ordenes de Trabajo</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h1>Ordenes de Trabajo - Información en detalle</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            Información Básica
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="solicitante">Nombre del solicitante:</label>
                                        <div class="form-control">
                                            {{ $orden->solicitante }}
                                        </div>
                                    </div>
                                    {{-- Área/Dependencia --}}
                                    <div class="form-group">
                                        <label for="area">Área / Dependencia:</label>
                                        <div class="form-control">
                                            {{ $orden->area }}
                                        </div>
                                    </div>
                                    {{-- Fecha de inicio --}}
                                    <div class="form-group" id="data_1">
                                        <label for="fechaInicio">Fecha de pedido:</label>
                                        <div class="form-control">
                                            {{ $orden->fechaInicio }}
                                        </div>
                                    </div>
                                    {{-- Fecha de finalización --}}
                                    <div class="form-group">
                                        <label for="fechaInicio">Fecha de finalización:</label>
                                        <div class="form-control">
                                            @if ( $orden->fechaFin == "")
                                            Pendiente
                                            @else
                                            {{ $orden->fechaFin }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Tipo de trabajo --}}
                                    <div class="form-group">
                                        <label>Tipo de trabajo:</label>
                                        <div class="form-control">
                                            {{ $orden->tipoTrabajo }}
                                        </div>
                                    </div>
                                    {{-- Tipo de mantenimiento --}}
                                    <div class="form-group">
                                        <label for="tipoMantenimiento">Tipo de Mantenimiento:</label>
                                        <div class="form-control">
                                            {{ $orden->tipoMantenimiento }}
                                        </div>
                                    </div>
                                    {{-- Precio --}}
                                    <div class="form-group">
                                        <label for="">Monto</label>
                                        <div class="form-control">
                                            ${{ number_format($orden->monto,0) }}
                                        </div>
                                    </div>
                                    {{-- Estado del mantenimiento --}}
                                    <div class="form-group">
                                        <label for="">Estado:</label>
                                        <div class="alert alert-success">
                                            <strong>{{ $orden->tipoEstado }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- Descripción --}}
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <div class="form-control">
                                            {!! $orden->descripcion !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Observaciones --}}
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- Descripción --}}
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <div class="form-control">
                                            {!! $orden->observacion !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <div class="form-group">
                        <button type="button" class="btn btn-md btn-warning"
                            onclick="window.location='{{ route('ordenes.index') }}'">Cancelar</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
    </body>

</html>
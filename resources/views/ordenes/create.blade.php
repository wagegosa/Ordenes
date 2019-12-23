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
        {{-- Datepicker --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/datapicker/bootstrap-datepicker3.css') }}">
        {{-- Summernote --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/summernote/summernote-bs4.css') }}">
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
        <title>Ordenes de Trabajo</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h1>Ordenes de Trabajo - Registro</h1>
            </div>
            @include('partials/errors')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('ordenes.store') }}" method="post" autocomplete="off">
                        {{-- Token de seguridad --}}
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Información Básica
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="solicitante">Nombre del solicitante:</label>
                                    <input type="text" class="form-control" placeholder="Nombre del solicitante"
                                        name="solicitante" id="solicitante" value="{{ old('solicitante') }}">
                                </div>
                                {{-- Área/Dependencia --}}
                                <div class="form-group">
                                    <label for="area">Área / Dependencia:</label>
                                    <input type="text" class="form-control" placeholder="Nombre del área o dependencia"
                                        name="area" id="area" value="{{ old('area') }}">
                                </div>
                                {{-- Fecha de inicio --}}
                                <div class="form-group" id="data_1">
                                    <label for="fechaInicio">Fecha de inicio:</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" name="fechaInicio" id="fechaInicio"
                                                value="{{ old('fechaInicio') }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Tipo de trabajo --}}
                                <div class="form-group">
                                    <label>Tipo de trabajo:</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="tipoTrabajo"
                                                value="Obras Civiles"
                                                {{ old('tipoTrabajo', $orden->tipoTrabajo ?? '') == 'Obras Civiles' ? 'checked' : '' }}>Obras Civiles
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="tipoTrabajo"
                                                value="Obras Eléctricas"
                                                {{ old('tipoTrabajo', $orden->tipoTrabajo ?? '') == 'Obras Eléctricas' ? 'checked' : '' }}>Obras Eléctricas
                                        </label>
                                    </div>
                                </div>
                                {{-- Descripción --}}
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="summernote" name="descripcion" id="descripcion" rows="6"
                                        placeholder="Descripción del tipo de orden de trabajo.">{{ old('descripcion') }}</textarea>
                                </div>
                                {{-- Tipo de mantenimiento --}}
                                <div class="form-group">
                                    <label for="tipoMantenimiento">Tipo de Mantenimiento:</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="tipoMantenimiento"
                                                value="Correctivo"
                                                {{ old('tipoMantenimiento', $orden->tipoMantenimiento ?? '') == 'Correctivo' ? 'checked' : '' }}>Correctivo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="tipoMantenimiento"
                                                value="Preventivo"
                                                {{ old('tipoMantenimiento', $orden->tipoMantenimiento ?? '') == 'Preventivo' ? 'checked' : '' }}>Preventivo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="tipoMantenimiento"
                                                value="Predictivo"
                                                {{ old('tipoMantenimiento', $orden->tipoMantenimiento ?? '') == 'Predictivo' ? 'checked' : '' }}>Predictivo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="tipoMantenimiento"
                                                value="Emergente"
                                                {{ old('tipoMantenimiento', $orden->tipoMantenimiento ?? '') == 'Emergente' ? 'checked' : '' }}>Emergente
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Guardar</button>
                            <button type="button" class="btn btn-md btn-warning"
                                onclick="window.location='{{ route('ordenes.index') }}'">Cancelar</button>
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
        {{-- Datepicker --}}
        <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/plugins/datapicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
        {{-- Summernote --}}
        <script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('js/plugins/summernote/lang/summernote-ca-ES.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.summernote').summernote({
                    tabsize: 2,
                    height: 200
                });

                // datepicker
                $('#data_1 .input-group.date').datepicker({
                    keyboardNavigation: false,
                    orientation: "top auto",
                    language: "es",
                    format: "yyyy-mm-dd",
                    calendarWeeks: false,
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>
    </body>

</html>
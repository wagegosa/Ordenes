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

		<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/dataTables/datatables.min.css') }}">
		<link rel="stylesheet" type="text/css"
			href="{{ asset('css/plugins/dataTables/dataTables.bootstrap4.min.css') }}">
		<title>Ordenes de Trabajo</title>
	</head>

	<body>
		<div class="container">
			<h1>Ordenes de Trabajo</h1>
			<div class="row">
				<div class="float-right">
					<button type="button" class="btn btn-w-m btn-primary"
						onclick="window.location='{{ route('ordenes.create') }}'">
						Adicionar <i class="fa fa-plus-square" aria-hidden="true"></i>
					</button>
					{{-- Botón importar --}}
					{{-- <button type="button" class="btn btn-w-m btn-success"
						onclick="window.location='{{ route('ordenes.import.excel') }}'">Importar <i
							class="fa fa-file-excel-o" aria-hidden="true"></i></button> --}}
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				@if(session()->get('success'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					{{ session()->get('success') }}
				</div>
				@endif
			</div>

			<div class="row">
				<table class="table table-striped" id="tbl" width="100%">
					<thead>
						<tr>
							<th width="32px">ID</th>
							<th>Fecha Inicio</th>
							<th>Solicitante</th>
							<th>Área/Dependencia</th>
							<th>Tipo Trabajo</th>
							<th>Estado</th>
							<th width="96px"><i class="fa fa-cogs"></i> Opciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>

		<script src="{{ asset('js/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function() {
            $('#tbl').DataTable({
                "pagingType": "full_numbers",
                // Idioma
                "language": {
                    "url": "{{ asset('js/plugins/dataTables/Spanish.json') }}"
                },
                // Paginación de registros en la tabla.
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todo"]],
                // CSS y ordenamiento de columnas.
                "columnDefs": [
                    { className: "align-middle", "targets": '_all' }
                    // Ordenamiento de columnas restringido
                    ,{ orderable: false, targets: [0, 6] }
                ],
                // Procesa la consulta con PHP del lado del servidor
                "processing": true,
                "serverSide": true,
                // Conexion vía ajax al servidor
                "ajax": "{{ route('ordenes.index') }}",
                // Imprime las columnas
                "columns": [
                    {data: 'id'},
                    {data: 'fechaInicio'},
                    {data: 'solicitante'},
                    {data: 'area'},
                    {data: 'tipoTrabajo'},
                    {data: 'tipoEstado'},
                    {data: 'btn', className: "text-center"},
                ]
            });
        });
		</script>
	</body>

</html>
@if($errors->any())
<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	<p>
		<strong><i class="fa fa-bullhorn"></i> ¡Oops, ha ocurrido una serie de errores!</strong>
		<br>Por favor, verifique los campos y corrige los siguientes errores:
	</p>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
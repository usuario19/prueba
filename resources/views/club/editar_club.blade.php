@extends('plantillas.main')
@section('title')
SisO: Editar Clubs
@endsection
@section('content')
<div class="container col-md-8">
	<h1 class="display-4">Editar Club</h1>
	<br>
</div>
<div class="container col-md-9">
	
	{!! Form::model($club, ['route'=>['club.update',$club->id_club],'method'=>'PUT','enctype'=>'multipart/form-data','file'=>true]) !!}
	<div class="form-row">
		<div class="form-group col-md-4">
			<div class="form-row">
					<div class="form-group col-md-12">
						<img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/logos/{{$club->logo}}" alt="" height="200px" width="200px" >
							<img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
						</div>
			</div>
			<div class="form-row">
						<div class="form-group col-md-5">
							
							<div id="div_file">
								<img id="texto" src="/storage/fotos/subir.png"  alt="">
								{!! Form::file('logo', ['class'=>'upload','id'=>'input']) !!}
							</div>
						</div>

						<div class="form-group col-md-5" id="content" style="">
							<div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
						</div>
			</div>
		</div>
		<div class="form-group col-md-8">
			<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::label('nombre_club', 'Nombre del Club', []) !!}
					{!! Form::text('nombre_club',$club->nombre_club,['class'=>'form-control'])!!}

				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::label('alias_club', 'Alias del Club', []) !!}
					{!! Form::text('alias_club', null, ['class'=>'form-control']) !!}
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::label('color_club', 'Color del Club', ['class'='']) !!}
					{!! Form::color('color_club', null , ['class'=>'']) !!}
				</div>
			</div>
			@if(Auth::User()->tipo == 'Administrador')
				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('id_administrador', 'Coordinador', []) !!}
						{!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
						
					</div>
				</div>
			@else
				<div class="form-row" style="display: none;">
					<div class="form-group col-md-12">
						{!! Form::label('id_administrador', 'Coordinador', []) !!}
						{!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
						
					</div>
				</div>
			@endif
				
				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('ciudad', 'Ciudad', []) !!}
						{!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
				    </div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('descripcion_club', 'Descripcion', []) !!}
						{!! Form::textarea('descripcion_club', $club->descripcion_club, ['class'=>'form-control','rows'=>4]) !!}
					</div>
				</div>
				<br>
				<div class="form-row">
				<div class="form-group col-md-12">
					{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}

				</div>
		</div>
		</div>
		
	</div>
		

	{!! Form::close() !!}
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/script.js') !!}
@endsection
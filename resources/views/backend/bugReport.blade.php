@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
			<div class="page-header">
				<h2>Rapporteer een fout.</h2>
			</div>

			<form method="POST" action="{!! route('bug.post') !!}">
				{{-- CSRF protection --}}
				{!! csrf_field() !!}

				<div class="form-group required">
					<label for="title" class="control-label">Titel:</label>
					<input id="title" style="width: 80%;" type="text" class="form-control" name="title" />
					<small class="text-muted">Een zeer korte beschrijving v/d fout.</small>
				</div>

				<div class="form-group">
					<label for="body">Beschrijving:</label>
					<textarea name="body" id="body" class="form-control" rows="10"></textarea>
				</div>

				<button type="submit" class="btn btn-success">
					Insturen
				</button>
			</form>
		</div>
	</div>
@stop

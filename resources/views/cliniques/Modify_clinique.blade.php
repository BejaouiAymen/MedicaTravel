@extends('Admin')

@section('title','Clinique')

@section('titlebig','Clinique')

@section('titlesmall','Edit_Clinique')

@section('content')


<br /><br /><br />
	<div class="row">
		<div class="col-md-12 offset-0">
			<form method="POST" action="/clinique/{{$clinique->id}}">
				{{method_field('PATCH')}}
				{{csrf_field()}}
				<fieldset class="border p-2">
   				<legend  class="w-auto">Edit</legend>
					<div class="form-group">
						<label>Titre :</label>
						<input type="text" class="form-control" name="titre" value="{{$clinique->titre}}" />
					</div>
					<div class="form-group">
						<label>Votre Description</label>
						<input type="text" class="form-control" name="description" value="{{$clinique->description}}" />
					</div>
					<div class="form-group">
						<label>Votre Prix :</label>
						<input type="text" class="form-control" name="prix" value="{{$clinique->prix}}"  />
					</div>
					<div class="form-group">
						<label>l'année'</label>
						<input type="text" class="form-control" name="year" value="{{$clinique->year}}"  />
					</div>
					<div class="form-group">
						<label>Votre Image URL</label>
						<input type="text" class="form-control" name="image" value="{{$clinique->URL}}"  />
					</div>
					
					
									
					<br />
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</fieldset>
			</form>
		</div>	
	</div>



@endsection
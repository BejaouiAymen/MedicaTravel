@extends('Admin')

@section('title','Notre Specialités')

@section('titlebig','Specialite')

@section('titlesmall','Listes')

@section('content')

<br /><br /><br />
	<div class="row">
		<div class="col-md-10 offset-1">
			<form method="POST" action="/specialite_save">
				{{csrf_field()}}
				
				<fieldset class="border p-2">
   				<legend  class="w-auto">Listes des Specialites Pour Notre Chirurgien</legend>
   						<div class=" offset-1">
						<h3>{{$k}}</h3>
							  <dl>
							    <dt>Specialites available :</dt>
							    @if($specialites->isEmpty())
									<dd class="offset-1"><strong> -Il'y a pas des specialites. </strong></dd>
								@else
							    @foreach($specialites as $specialite )
							    <dd class="offset-1"><strong>- {{$specialite->specialite}}</strong></dd>
							    @endforeach
							    @endif
							  </dl>  
								<div class="form-group {{$errors->has('specialite')? 'has-error has-feedback' : ''}}">
									<label>Specialite</label>
									<input type="text" class="form-control " name="specialite" placeholder="Saisir votre specialite"/>
								</div>
	 					 </div>
  					<button type="submit" class="btn btn-primary hidden">Ajouter</button>
					</fieldset>
					@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
								<li>
									{{$error}}
								</li>
								@endforeach
							</ul>	
						</div>
						@endif
					</form>
				</div>
			</div>



@endsection
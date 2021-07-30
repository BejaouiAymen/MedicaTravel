@extends('Admin')

@section('title','Clinique')

@section('titlebig','Clinique')

@section('titlesmall','Supprimer_Clinique')

@section('content')


<br /><br /><br />
	<div class="row">
		<div class="col-md-8 offset-2">
			<form method="POST" action="/clinique/{{$clinique->id}}">
				{{method_field('DELETE')}}
				{{csrf_field()}}
				
				<fieldset class="border p-2">
   				<legend  class="w-auto">{{$clinique->titre}} 's Infos</legend>
   						<div class=" offset-1">

							  <dl>
							    <dt>Titre :</dt>
							    <dd>- {{$clinique->titre}}</dd>
							    <dt>Description :</dt>
							    <dd>- {{$clinique->description}}</dd>
							    <dt>Prix Hotel :</dt>
							    <dd>- ${{$clinique->prix}}</dd>
							    <dt>Annee :</dt>
							    <dd>- {{$clinique->year}}</dd>
							  </dl>     
 					 </div>
  					<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#myModal">Supprimer</button>
 					<a href="/clinique/{{$clinique->id}}/edit" class="pull-right btn btn-primary" role="button">Modifier</a>

					<div class="modal fade" id="myModal" role="dialog">
					    <div class="modal-dialog modal-sm">
					      <div class="modal-content">
					        <div class="modal-header">
					        	<h4 class="modal-title">Alert!</h4>
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <div class="modal-body">
					          <p>Are You Sure You Want To Delete Cette Clinique!!.</p>
					        </div>
					        <div class="modal-footer">
					        	<button type="submit" class="btn btn-warning">Delete!</button>
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					      </div>
					    </div>
					 </div>
				</fieldset>
			</form>
		</div>	
	</div>
	
<div class="container">

  <!-- Modal -->
  
</div>
	
	


@endsection
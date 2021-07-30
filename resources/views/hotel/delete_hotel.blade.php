@extends('Admin')

@section('title',' Delete')

@section('titlebig','Delete')

@section('titlesmall','Delete_Hotel')

@section('content')
<br /><br /><br />
	<div class="row">
		<div class="col-md-8 offset-2">
			<form method="POST" action="/hotel/{{$hotel->id}}">
				{{method_field('DELETE')}}
				{{csrf_field()}}
				
				<fieldset class="border p-2">
   				<legend  class="w-auto">{{$hotel->titre}} 's Infos</legend>
   						<div class=" offset-1">

							  <dl>
							    <dt>Titre :</dt>
							    <dd>- {{$hotel->titre}}</dd>
							    <dt>Description :</dt>
							    <dd>- {{$hotel->description}}</dd>
							    <dt>Prix Hotel :</dt>
							    <dd>- ${{$hotel->prix}}</dd>
							    <dt>Annee :</dt>
							    <dd>- {{$hotel->year}}</dd>
							  </dl>     
 					 </div>
  					<center><button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#myModal">Supprimer</button>
					</center>
					
					<div class="modal fade" id="myModal" role="dialog">
					    <div class="modal-dialog modal-sm">
					      <div class="modal-content">
					        <div class="modal-header">
					        	<h4 class="modal-title">Alert!</h4>
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <div class="modal-body">
					          <p>Are You Sure You Want To Delete This Hotel!!.</p>
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

@extends('Admin')

@section('title','Chirurgien')

@section('titlebig','Chirurgien')

@section('titlesmall','Update_Chirurgien')
<link href="{{asset('css/ChirurgienStyle.css')}}" rel="stylesheet" />

@section('content')
    <div class="container">
    	<br />
    	<div class="row" >
		<div class="col-md-6 offset-1">
			<form method="POST" action="/chirurgien/{{$chirurgien->id}}">
				{{method_field('PATCH')}}
				{{csrf_field()}}
				<fieldset class="border p-2">
   				<legend  class="w-auto">Modifier Un Chirurgien</legend>
					<div class="form-group {{$errors->has('nom')? 'has-error has-feedback' : ''}}">
						<label>Votre Nom Complet</label>
						<input type="text" id="nom" onchange="myFunction(mytitre)" class="form-control " name="nom" placeholder="Saisir votre Full name" value="{{$chirurgien->fullname}}"/>
					</div>
					<div class="form-group {{$errors->has('telephone')? 'has-error has-feedback' : ''}}">
						<label>Telephone</label>
						<input type="text" id="telephone" onchange="myFunction(mydescription)" class="form-control" name="telephone" placeholder="telephone" value="{{ $chirurgien->telephone}}"/>
					</div>
					<div class="form-group {{$errors->has('image')? 'has-error has-feedback' : ''}}">
						<label>Image URL</label>
						<input type="text" id="image" onchange="myFunction(myimage)" class="form-control" name="image" placeholder="Votre image link" value="{{ $chirurgien->URL}}"/>
					</div>
					<div class="form-group {{$errors->has('age')? 'has-error has-feedback' : ''}}">
						<label>Age</label>
						<input type="text" id="age" onchange="myFunction(myyear)" class="form-control" name="age" placeholder="Age" value="{{$chirurgien->age}}"/>
					</div>	
					
					<br />
					<h4> <strong> Specialites available :</strong></h4>
					@foreach($specialites as $specialit)
					<label class="container">
						
							  <input type="checkbox" name="ids[]" value="{{$specialit->id}}" @foreach($specialite as $k) @if($specialit->id==$k) checked @endif 	@endforeach>
					  		
					  
					  <span class="checkmark">{{$specialit->specialite}}</span>
					</label>
					@endforeach
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Update</button>
						 
					</div>					
				</fieldset>
				
			</form>
		</div>	

		
    	
    	
    	<br />

				<div class="col-md-4">
		    		    <div class="card profile-card-1">
		    		        <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background"/>
		    		        <img id="demo3" src="{{ $chirurgien->URL}}" width="35%" height="30%" alt="profile-image" class="profile"/>
		                    <div class="card-content">
		                    <h2><strong id="demo" style="color: white">{{$chirurgien->fullname}}</strong>
		                    	@foreach($chirurgien->specialites as $specialites)
		                    			<small style="color: #CACACA">{{$specialites->specialite}}</small>
		                    		@endforeach
		                    </h3>
		                    <div class="icon-block">
		                    	<a href="#"><i  data-toggle="tooltip" data-placement="bottom" title="{{$chirurgien->telephone}}" class="fa fa-phone"></i></a>
		                    	<a href="#"> <i  data-toggle="tooltip" data-placement="bottom" title="Age est {{$chirurgien->age}}" class="fa fa-info"></i></a>
		                    	<a href="/chirurgien_delete/{{$chirurgien->id}}"> <i data-toggle="tooltip" data-placement="bottom" title="Clicker Pour Supprimer!" class="fa fa-trash-o"></i></a>
		                    </div>
		                    </div>
		                </div>
		                <p class="mt-3 w-100 float-left text-center"><strong>Votre Card</strong></p>
	    		</div> 
		</div>
</div>



<script>
				var mytitre="nom";
				var myyear="age";
				var myimage="image";
				var mydescription="description";


function myFunction(k) {
  var x = document.getElementById(k).value;
  switch(k){
  	case "nom":  document.getElementById("demo").innerHTML =x;
	break;
  	case "age":  document.getElementById("demo2").innerHTML ="Age: "+x;
	break;
	case "image": document.getElementById("demo3").src =x;
	break;
	case "telephone":  document.getElementById("demo4").innerHTML =x;
	break;
	
	default:""
  }
}
</script>

@endsection
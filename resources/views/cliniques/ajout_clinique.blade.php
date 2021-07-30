@extends('Admin')

@section('title','Clinique')

@section('titlebig','Clinique')

@section('titlesmall','Clinique_Liste')
<link href="{{asset('css/CliniqueStyle.css')}}" rel="stylesheet" />

@section('content')


<div class="container">
<div class="row">

	<div class="col-md-6 offset-1">
			<form method="POST" action="/clinique">
				{{csrf_field()}}
				<fieldset class="border p-2">
   				<legend  class="w-auto">New Clinique</legend>
					<div class="form-group {{$errors->has('titre')? 'has-error has-feedback' : ''}}">
						<label>Titre</label>
						<input type="text" id="titre" onchange="myFunction(mytitre)" class="form-control " name="titre" placeholder="titre du clinique" value="{{ old('titre')}}"/>
					</div>
					<div class="form-group {{$errors->has('description')? 'has-error has-feedback' : ''}}">
						<label>Description</label>
						<input type="text" id="description" onchange="myFunction(mydescription)" class="form-control" name="description" placeholder="Description du clinique" value="{{ old('description')}}"/>
					</div>
					<div class="form-group {{$errors->has('prix')? 'has-error has-feedback' : ''}}">
						<label>Prix</label>
						<input type="text" id="prix" onchange="myFunction(myprix)" class="form-control" name="prix" placeholder="Votre Prix" value="{{ old('prix')}}"/>
					</div>
					<div class="form-group {{$errors->has('image')? 'has-error has-feedback' : ''}}">
						<label>Image URL</label>
						<input type="text" id="image" onchange="myFunction(myimage)" class="form-control" name="image" placeholder="Votre image link" value="{{ old('image')}}"/>
					</div>
					<div class="form-group {{$errors->has('year')? 'has-error has-feedback' : ''}}">
						<label>Year</label>
						<input type="text" id="year" onchange="myFunction(myyear)" class="form-control" name="year" placeholder="Year" value="{{ old('year')}}"/>
					</div>	
					
					<br />
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Ajouter</button>
						 
					</div>					
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
	
	
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" id="demo3" src="{{ old('image')}}">
                    </a>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label" id="demo2">{{ old('year')}}</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#" id="demo">{{ old('titre')}}</a></h3>
                    <div class="price" id="demo1">${{ old('prix')}}
             		</div>
                    <a class="add-to-cart" href="#" id="demo4">{{ old('description')}}</a>
                </div>
            </div>
        </div>
	</div>
</div>


<script>
				var mytitre="titre";
				var myyear="year";
				var myprix="prix";
				var myimage="image";
				var mydescription="description";


function myFunction(k) {
  var x = document.getElementById(k).value;
  switch(k){
  	case "titre":  document.getElementById("demo").innerHTML =x;
	break;
  	case "prix":  document.getElementById("demo1").innerHTML ="$"+x;
	break;
	case "year":  document.getElementById("demo2").innerHTML =x;
	break;
	case "image": document.getElementById("demo3").src =x;
	break;
	case "description":  document.getElementById("demo4").innerHTML =x;
	break;
	
	default:""
  }
}
</script>

@endsection
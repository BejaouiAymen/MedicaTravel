@extends('Admin')

@section('title','Liste Chirurgiens')

@section('titlebig','Chirurgien')

@section('titlesmall','Chirurgien_List')
<link href="{{asset('css/ChirurgienStyle.css')}}" rel="stylesheet" />

@section('content')
    <div class="container">
    	<br />
    	<br />
		@foreach($chirurgiens as $chirurgien)
		         <a class="block-link" href="/chirurgien/{{$chirurgien->id}}">

				<div class="col-md-4">
		    		    <div class="card profile-card-1">
		    		        <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background"/>
		    		        <img src="{{ $chirurgien->URL}}" width="45%" height="35%" alt="profile-image" class="profilee"/>
		                    <div class="card-contenttt">
		                    <h2><strong style="color: white">{{$chirurgien->fullname}}</strong>
		                    	@foreach($specialites as $specialite)
		                    		@if($specialite[1]==$chirurgien->id)
		                    			<small style="color: #CACACA">{{$specialite[0]}}</small>
		                    		@endif
		                    	@endforeach
		                    </h3>
		                    <div class="icon-block"><a href="#"><i  data-toggle="tooltip" data-placement="bottom" title="{{$chirurgien->telephone}}" class="fa fa-phone"></i></a><a href="#"> <i  data-toggle="tooltip" data-placement="bottom" title="Age est {{$chirurgien->age}}" class="fa fa-info"></i></a>
		                    	<a href="/chirurgien_delete/{{$chirurgien->id}}"> <i data-toggle="tooltip" data-placement="bottom" title="Clicker Pour Supprimer!" class="fa fa-trash-o"></i></a></div>
		                    </div>
		                </div>
		                <p class="mt-3 w-100 float-left text-center"><strong>Basic Profile Card</strong></p>
	    		</div> 
		</a>
		@endforeach
		</div>

@endsection
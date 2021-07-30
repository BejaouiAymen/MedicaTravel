
@extends('Admin')

@section('title','Simple Mode')

@section('titlebig','Hotel')

@section('titlesmall','List_Hotel')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<h2 class="title">{{$titre}}</h2>
<form action="/liste">
  <select name="liste" class="custom-select col-xs-3 pull-right">
    <option value="0"  {{$op0}}>Recherche Par Default</option>
    <option value="4" {{$op4}}>Recherceh par nom</option>
    <option value="3" {{$op3}}>Recherceh par Date de Creation</option>    
    <optgroup label="Rechereche Par Prix">
    	<option value="1" {{$op1}}>Recherceh par Prix Decroissant</option>
    	<option value="2" {{$op2}}>Recherceh par Prix Croissant</option>
	</optgroup>
  </select>
  <br />
  <br />
<button type="submit" class="btn btn-info pull-right">
      <span class="glyphicon glyphicon-search"></span> Search
 </button></form>
 <br />
 <br />
  <a href="liste" class="pull-right btn btn-primary disabled" role="button">Simple Mode</a>
    
  <a href="list_adv" class="pull-right btn btn-primary enabled" role="button">Advanced Mode</a>

<div class="container">
    <br>
	<br>
	<div class="row" id="ads">
    <!-- Category Card -->
    @foreach ($hotel as $us)
    <div class="col-md-5">
    	

        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">{{$us->titre}}</span>
                <span class="card-notify-year">{{$us->year}}</span>
                <img class="img-fluid" src="{{$us->URL}}"  width="445" height="250" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
                <span class="card-detail-badge">Used</span>
                <span class="card-detail-badge">${{$us->prix}}</span>
                <span class="card-detail-badge">13000 Kms</span>
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                    <h5>{{$us->description}}</h5>
                </div>
                @if($type=="modification")
                <a class="ad-btn" href="/hotel/{{$us->id}}/edit">Modifier</a>
            	@elseif($type=="delete")
            	<a class="ad-btn" href="/hotel/{{$us->id}}">Supprimer</a>
            	@endif
            </div>
            
        </div>
    </div>        @endforeach

<br />
    <center><a href="hotel/create">ajout</a></center>

</div>
</div>

@endsection
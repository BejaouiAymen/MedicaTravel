@extends('Admin')

@section('title','Clinique')

@section('titlebig','Clinique')

@section('titlesmall','Clinique_Liste')
<link href="{{asset('css/CliniqueStyle.css')}}" rel="stylesheet" />

@section('content')

<h2 class="title">{{$titre}}</h2>
<form action="/clin/liste">
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
	 </button>
 </form>
 <br />
 <br />

<div class="container">
    <br>
 	<div class="row" id="ads">
    <!-- Category Card -->
    @foreach ($clinique as $cliniq)

        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="/clinique/{{$cliniq->id}}">
                        <img class="pic-1" src="{{$cliniq->URL}}">
                    </a>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">{{$cliniq->year}}</span>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{$cliniq->titre}}</a></h3>
                    <div class="price">${{$cliniq->prix}}
             		</div>
                    <a class="add-to-cart" href="#">{{$cliniq->description}}</a>
                </div>
            </div>
        </div>
        @endforeach

</div>
</div>
@endsection
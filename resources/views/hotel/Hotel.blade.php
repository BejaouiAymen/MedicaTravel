
@extends('Admin')

@section('title','Product')

@section('titlebig','Hotel')

@section('titlesmall','List_Hotel')
@section('content')
<!------ Include the above in your HEAD tag ---------->

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
                <a class="ad-btn" href="/hotel/{{$us->id}}/edit">Modifier</a>
            </div>
            
        </div>
    </div>        @endforeach

<br />
    <center><a href="hotel/create">ajout</a></center>

</div>
</div>

<center>{{ $hotel->links()   }}
</center>
@endsection
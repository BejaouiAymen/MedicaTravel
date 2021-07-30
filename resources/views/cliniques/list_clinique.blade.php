@extends('Admin')

@section('title','Clinique')

@section('titlebig','Clinique')

@section('titlesmall','Clinique_Liste')
<link href="{{asset('css/CliniqueStyle.css')}}" rel="stylesheet" />

@section('content')

<div class="container">
    <br>
 	<div class="row" id="ads">
    <!-- Category Card -->
    @foreach ($clinique as $cliniq)

        <div class="col-md-4 col-sm-6">
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

<center>{{ $clinique->links()   }}
</center>
@endsection
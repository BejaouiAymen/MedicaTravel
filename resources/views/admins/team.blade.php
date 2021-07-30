@extends('Admin')

@section('title','Our_Team')

@section('titlebig','Team')

@section('titlesmall','Team_Members')

<link href="{{asset('css/Team.css')}}" rel="stylesheet" />
<!------ Include the above in your HEAD tag ---------->
@section('content')
<!-- Team -->
<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">OUR TEAM</h5>
        <div class="row">
        	 @foreach ($admin as $us)
            <!-- Team member -->
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{$us->URL}}" alt="card image"></p>
                                    <h4 class="card-title">{{$us->nom}}</h4>
                                    <p class="card-text">{{$us->smalldescription}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">{{$us->prenom}}</h4>
                                    <p class="card-text">{{$us->fulldescription}}</p>
                                    
                                   	@if(auth()->user()->profile)
                                   	<a href="/messages/{{$us->user_id}}" data-toggle="tooltip" data-placement="bottom" title="Let's Chat!"><i class="fa fa-comments" style="color:#1569C7"></i></a>
									@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- ./Team member -->
            <!-- Team member -->
            
            <!-- ./Team member -->

        </div>
    </div>
</section>
<!-- Team -->

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

@endsection
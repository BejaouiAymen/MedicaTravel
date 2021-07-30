@extends('Admin')

@section('title',' Notification')

@section('titlebig','Notification')

@section('titlesmall','All Your Notifications')

@section('content')
<br /><br /><br />
	<div class="row">
		<div class="col-md-8 offset-2">
			<ul>
			@foreach (auth()->user()->notifications as $notification)
                  
                  <li style="color:red ; font-size:20px; {{($notification->read_at==null)? 'background-color:lightgray' :'background-color:white'}}">
                  	@if($notification->read_at==null)
                  	    <span class="pull-right-container">
			              <small class="label pull-right bg-green">new</small>
			            </span>

                  	@endif
                    <a href="/notificationRead/{{$notification->id}}">
                      @if ($notification->data['type']=="ajout")
	                      <i class="fa fa-hotel"></i> 
	                      	@elseif ($notification->data['type']=="suppression")
	                       <i class="fa fa-trash"></i> 
	                     	 @else ($notification->data['type']=="modification")
	                       <i class="fa fa-list"></i> 
                      @endif
                    {{$notification->data['data']}}
                    </a>
                  </li>
                  <br />
                  @endforeach			
		</ul>
		</div>	
	</div>
	
	
	
	
	
	

@endsection

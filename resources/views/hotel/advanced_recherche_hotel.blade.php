@extends('Admin')

@section('title',' Advanced Mode')

@section('titlebig','Hotel')

@section('titlesmall','Hotel_Liste')

	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* 

.zoom {
  padding: 0px;
  background-color: ;
  transition: transform .2s;
  width: 20%;
  height: 1%;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(3.5); 
}
</style>
	
@section('content')
    
<br />
 <a href="liste" class="pull-right btn btn-primary enabled" role="button">Simple Mode</a>
    
  <a href="list_adv" class="pull-right btn btn-primary disabled" role="button">Advanced Mode</a>

<h1><p class="text-left">All Your Hotels Infos Are :</p></h1>
<br />
<br />
  <input class="form-control" id="myInput" type="text" placeholder="Search..">

<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Prix</th>
               <th>Year</th>
        <th>Image URL</th>
        <th>Modifier</th>
        <th>Supprimer</th>

      </tr>
    </thead>

@foreach ($hotel as $us)
 
    <tbody  id="myTable">
      <tr>
        <td><center>{{$us->titre}}</center></td>
        <td><center>{{$us->description}}</center></td>
        <td><center>${{$us->prix}}</center></td>
        <td><center>{{$us->year}}</center></td>
 		<td><center><img class="zoom img-fluid" src="{{ $us->URL}}" alt="Alternate Text" /></center></td>
        <td><center> <a href="hotel/{{$us->id}}/edit">Update</a></center></td>
        <td><center> <a href="hotel/{{$us->id}}">delete</a></center></td>

      </tr>
	</tbody>

@endforeach
</table>


@endsection

@extends('layouts/main')
@section('content')

<div class="callout primary">
<div class="row column">
    
<h1>{{$galleries->name}}</h1>
<p class="lead">{{$galleries->description}}</p>
<p> <a class="active" class='button' href="/gallery">Back to Gallery</a></p>
 <?php if(Auth::check()) :   ?>
<a class='button' href="/photo/create/{{$galleries->id}}">Upload project</a>
 <?php endif; ?>
</div>
</div>

<div class="row small-up-2 medium-up-3 large-up-4">
    
    <?php foreach($photos as $photo) : ?>  
    
    <div class="column">
        <a href="/photo/details/{{$photo->id}}">          
        <img class="thumbnail" src="/images/{{$photo->image}}">
        </a> 
        <h5>{{$photo->title}}</h5>
        <p>{{$photo->description}}</p>
        <p>{{$photo->location}}</p>
        
     </div>

    <?php endforeach ?>

  
</div>
 
<hr>

@stop

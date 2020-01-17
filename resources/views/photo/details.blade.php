@extends('layouts/main')
@section('content')
<div class="callout primary">
<div class="row column">
    <a href="/gallery/show/{{$photo->gallery_id}}">Back</a>
<h1>{{$photo->title}}</h1>
<p>{{$photo->location}}</p>
<p class="lead">{{$photo->description}}</p>
</div>
</div>

<div class="row small-up-2 medium-up-3 large-up-4">
    
    <div class='main'>
        <img style="height:300px; width: 400px;" class='text-center' src="/images/{{$photo->image}}">
        
         <?php if(Auth::check()) :   ?>
        <p>
            <a href="/photo/edit/{{$photo->id}}" class='button'>Update this project</a>
            <a href="/photo/destory/{{$photo->id}}/{{$photo->gallery_id}}" class='button'>Delete this project</a>
        </p>
        <?php endif; ?>
        
    </div>
    
    
    
</div>
@stop

@extends('layouts/main')
@section('content')
<div class="callout primary">
<div class="row column">
    <a href="/gallery/show/{{$photo->gallery_id}}">Back</a>
<h1>Update Portfolio</h1>
<p class="lead">update to make portfolio perfectly</p>
</div>
</div>

<div class="row small-up-2 medium-up-3 large-up-4">
    
    <div class='maindiv'>
        
        
       
        <form class="login-form" action="/updatedata" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              
              <input type="hidden" value="{{$photo->id}}" name="id">
              
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Fill up all form</h3>
          
           <div class="form-group">
            <label class="control-label">Title</label>
            <input name="title" class="form-control  " type="text" value="{{$photo->title}}"  autofocus>
             
          </div>
          
          <div class="form-group">
            <label class="control-label">Description</label>
            <input name="description" class="form-control  " type="text" value="{{$photo->description}}"  autofocus>
             
          </div>
          <div class="form-group">
            <label class="control-label">Location</label>
            <input name="location" class="form-control  " type="text" value="{{$photo->location}}"  autofocus>
             
          </div>
          
          <div class="form-group">
            <label class="control-label">Cover Image</label>
             <input name='image' type="file" id="cover_image" >
             
             
          </div>
    <div>
        <img src="/images/{{$photo->image}}">
        
        
    </div>
          <input type="hidden" value="{{$photo->gallery_id}}" name="gallery_id">
          
          <input type="hidden" value="{{csrf_token()}}" name="_token">
          
        <div class="form-group btn-container">
            <input type="submit" class='button' name="submit" value="Update">
          </div>
         
        
        
       
          
        </form>
        
        
    </div>
    
</div>
@stop

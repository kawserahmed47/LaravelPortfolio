@extends('layouts/main')
@section('content')
<div class="callout primary">
<div class="row column">
<h1>Create Portfolio</h1>
<p class="lead">Here create portfolio and update</p>
</div>
</div>

<div class="row small-up-2 medium-up-3 large-up-4">
    
    <div class='maindiv'>
       
        <form class="login-form" action="/store" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Fill up all form</h3>
           <div class="form-group">
            <label class="control-label">NAME</label>
            <input name="name" class="form-control  " type="text" placeholder="Name" autofocus>
             
          </div>
          
          <div class="form-group">
            <label class="control-label">Description</label>
            <input name="description" class="form-control  " type="text" placeholder="DEscription" autofocus>
             
          </div>
          
          <div class="form-group">
            <label class="control-label">Cover Image</label>
             <input name='cover_image' type="file" id="cover_image" >
             
          </div>
          <input type="hidden" value="{{csrf_token()}}" name="_token">
          
        <div class="form-group btn-container">
            <input type="submit" name="submit" value="Add">
          </div>
         
        
        
       
          
        </form>
        
        
    </div>
    
</div>
@stop

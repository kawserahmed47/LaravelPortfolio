
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Kawser Ahmed</title>
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<link rel="stylesheet" href="/css/main.css">

</head>
<body>
    
    <div class="sidebar">
        <h4>Kawser Ahmed</h4>
  <a class="active" href="/gallery">Home</a>
  <?php if(!Auth::check()) :  ?>
   <a href="/login">Login</a>
          
   <?php endif; ?>
  
   <?php if(Auth::check()) :   ?>
  <a href="/gallery/create">Create</a>
  <a href="/register">Register</a> 
  <a href="/logout">Logout</a>
   <?php endif; ?>
 
</div>

<div class="content">
    @if(Session::has('message'))
    <div data-alert class="alert-box">
          {{Session::get('message')}}
    </div>
  
    
    
    @endif
    
  @yield('content')
</div>
    
    
    
    
    

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>

</body>
</html>

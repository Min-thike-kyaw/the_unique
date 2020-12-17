<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://startbootstrap.github.io/startbootstrap-simple-sidebar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <nav class="navigator fixed-top navbar navbar-expand-lg navbar-light bg-light px-5">
  <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <a href="/" class="main-header">The Unique</a>
    <ul class="navbar-nav ml-auto">
        @php
          $x = 0;
        @endphp 
      @foreach($categories as $category)
        
        @if($x < 3)
          <li class="nav-item col px-2">
            <a href="/{{$category->name}}" class="nav-link category-header">{{$category->name}}<span class="sr-only">(current)</span></a>
          </li>
      
        @endif
        @php
          $x++;
        @endphp
        
      @endforeach
        
        
          <li class="nav-item col pl-4 dropdown">
          <p class="nav-link category-header dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            All
          </p>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <div class="col-md-2">
          @foreach($categories as $category)
            
            <a class="dropdown-item" href="/{{$category->name}}">{{$category->name}}</a>
            
          @endforeach
          </div>
          </div>
        </li>
        <li class="nav-item col px-2">
              <a href="/authors" class="nav-link category-header">Authors<span class="sr-only">(current)</span></a>
        </li>
      


      
    </ul>
    
  </div>
</nav>

  <!-- <div class="col-sm-12">
    <img src="/images/cover-photo.jpg" class="image-fluid cover-photo">
  </div> -->
  
  <div class="container body">
  @yield("body")
  </div>
  
 
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>
</html>
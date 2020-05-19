<nav class="navbar navbar-expand-sm fixed-bottom navbar-dark bg-dark navbar-laravel">
<span class="navbar-toggler m-0 p-0">
  <button class=" btn btn-outline-orange" data-toggle="collapse"><span class="caret"><i class="fa fa-home"    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation"></i></span></button>
  <button class=" btn btn-outline-success" data-toggle="collapse"><span class="caret"><i class="fa fa-home fa-2"    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation"></i></span></button>
  <button class=" btn btn-outline-pink" data-toggle="collapse"><span class="caret"><i class="fa fa-search"   aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation"></i></span></button>
  <button class=" btn btn-outline-purple" data-toggle="collapse"><span class="caret"><i class="fa fa-user"    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation"></i></span></button>
  <button class=" btn btn-outline-info" data-toggle="collapse"><span class="caret"><i class="fa fa-home"    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation"></i></span></button>
</span>
<button class="navbar-toggler btn btn-outline-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
 
  <span class="navbar-toggler-icon"></span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent2">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">لوحة التكم</a>
      </li>
      <li class="nav-item dropdown">
<div class="btn-group dropup">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropup
  </button>
  <div class="dropdown-menu">
   <a class="dropdown-item" href="#">Action</a>
   <a class="dropdown-item" href="#">Another action</a>
   <div class="dropdown-divider"></div>
   <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-sm-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
</nav>

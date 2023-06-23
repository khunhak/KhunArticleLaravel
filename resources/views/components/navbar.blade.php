<nav class="navbar navbar-dark bg-dark"> 
      <div class="container">
        <a class="navbar-brand" href="/">Khun's Blog</a>
        <div class="d-flex">
        <a href="#blogs" class="nav-link">Blogs</a>
          @guest
          <a href="/register" class="nav-link">Register</a>  
          <a href="/login" class="nav-link">Login</a>
          @else
          <p class="nav-link" >{{auth()->user()->name}}</p>
          @endguest
          @auth
          <form action="./logout" method="POST">
          @csrf
            <button type="submit" class="nav-link btn btn-link">Logout</button>
          </form>
          @endauth
          <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
      </div>
</nav>
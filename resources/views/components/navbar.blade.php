<nav class="navbar navbar-dark bg-dark"> 
      <div class="container">
        <a class="navbar-brand" href="/">Khun's Blog</a>
        <div class="d-flex">
        <a href="#blogs" class="nav-link">Blogs</a>
          @guest
          <a href="/register" class="nav-link">Register</a>  
          <a href="/login" class="nav-link">Login</a>
          @else
          <img src="https://i.pinimg.com/originals/c0/27/be/c027bec07c2dc08b9df60921dfd539bd.webp"
          height="50" 
          width="50"
          class="rounded-circle"
          
          alt="">
          <p class="nav-link" >{{auth()->user()->name}}</p>
          @endguest
          @auth
          <form action="/logout" method="POST">
          @csrf
            <button type="submit" class="nav-link btn btn-link">Logout</button>
          </form>
          @endauth
          <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
      </div>
</nav>
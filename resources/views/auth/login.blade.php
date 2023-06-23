<x-layout>

    <div class="container min-vh-100">
        <div class="row">
            <div class="col-md-4 mx-auto">
            <h3 class="text-primary text-center my-2">Login form</h3>
                <div class="card shadow-sm my-4 p-4">
                <form method="POST" action="post_login">
                @csrf
                    <!-- @error('name')
                    <p class="text-danger">
                    {{$message}}
                    </p>
                    @enderror -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{old('email')}}">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required value="{{old('password')}}">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                @foreach($errors->all() as $error)
                <li class="text-danger" >{{$error}}</li>
                @endforeach
            </form>
                </div>

            </div>
        </div>
    </div>


</x-layout>
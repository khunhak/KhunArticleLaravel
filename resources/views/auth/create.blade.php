<x-layout>

    <div class="container min-vh-100">
        <div class="row">
            <div class="col-md-4 mx-auto">
            <h3 class="text-primary text-center my-2">Register form</h3>
                <div class="card shadow-sm my-4 p-4">
                <form method="POST" >
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input name="name"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{old('name')}}">
                    <!-- @error('name')
                    <p class="text-danger">
                    {{$message}}
                    </p>
                    @enderror -->
                    <x-error name="name" />
                </div>
                <div class="mb-3">
                    <labelfor="exampleInputEmail1" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{old('username')}}">
                    <x-error name="username" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{old('email')}}">
                    <x-error name="email" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required value="{{old('password')}}">
                    <x-error name="password" />
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
                </div>

            </div>
        </div>
    </div>


</x-layout>
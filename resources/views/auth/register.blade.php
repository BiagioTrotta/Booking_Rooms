<x-main>
    <div class="container">
        <div class="row w-50 m-auto">
            <h1 class="fa mb-2 text-center h1 mt-4 fa">Register</h1>
            <form method="POST" accept="/register">
                @csrf
                <div class="col-12">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="password_confirmationHelp">
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-dark fa text-center">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-main>
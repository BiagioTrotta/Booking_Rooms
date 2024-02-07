<x-main>
    <div class="container">
        <div class="row w-50 m-auto">
            <h1 class="fa mb-2 text-center h1 mt-4 fa">Login</h1>
            <form method="POST" accept="/login">
                @csrf
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
                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-dark fa text-center">Login</button>
                </div>

            </form>
        </div>
    </div>
</x-main>
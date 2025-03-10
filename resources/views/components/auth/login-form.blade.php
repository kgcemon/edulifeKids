<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90 p-4">
                <div class="card-body">
                    <div class="text-center">
                        <h4>ADMIN SIGN IN</h4>
                    </div>
                    @if(session()->has('error'))
                        <div class="alert alert-danger text-white" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <br/>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" placeholder="Enter your email"
                                   class="form-control @error('email') is-invalid @enderror" type="email" required />
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <br/>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" placeholder="Enter your password"
                                   class="form-control @error('password') is-invalid @enderror" type="password" required />
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <br/>

                        <button class="btn w-100 bg-gradient-primary">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

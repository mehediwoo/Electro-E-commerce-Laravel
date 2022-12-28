@extends('layout.app2')
@section('title','Admin Login')
@section('content')

<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://images.unsplash.com/photo-1615719413546-198b25453f85?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  @if (session()->has('error'))
                      <h2 class="text-danger">{{ session()->get('error') }}</h2>
                  @endif

                  <form action="{{ url('/login') }}" method="post">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0" style="color: #ff6219;">Electra</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-outline mb-4">
                      <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>

                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>


                    <div class="pt-1 mb-4">
                      {{-- <button class="btn btn-dark btn-lg btn-block" type="button">
                        Login</button>
                        <a href="" ></a> --}}
                        <input type="submit" style="color: #97644c;" value="Login" class="btn btn-dark btn-lg btn-block">
                    </div>


                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


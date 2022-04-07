@extends('layouts.main')
@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5 ">
            <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
          <form action="/register" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="floatingInput" placeholder="Full name" value="{{ old('name') }}"  required>
              <label for="floatingInput">Name</label>
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="floatingInput" placeholder="Username" value="{{ old('username') }}"  required>
              <label for="floatingInput">Username</label>
              @error('username')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control  @error('email')is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}"  required>
              <label for="floatingInput">Email address</label>
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Password</label>
              @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Register</button>
          </form>
          <small class="d-block text-center">Already have account? <a href="/login">Login</a></small>
        </main>
        </div>
    </div>
@endsection
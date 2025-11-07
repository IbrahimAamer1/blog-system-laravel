@extends('theme.master')
@section('title', 'Login')
@section('content')
@include('theme.partials.hero', ['title' => 'Login'])
 <!-- ================ contact section start ================= -->
 <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <form action="{{ route('login') }}" method="POST" id="contactForm">
            @csrf
            <div class="form-group">
              <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address" value="{{ old('email') }}" required autofocus>
              @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <input class="form-control border" name="password" id="password" type="password" placeholder="Enter your password" required>
              @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <a href="{{route('register')}}" class="button button--active button-contactForm">معندكش حساب اخويا؟? register</a>
              <button type="submit" class="button button--active button-contactForm">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
@endsection
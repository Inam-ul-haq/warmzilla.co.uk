@extends('layouts.main')
@section('content')
    <section class="banner">
      <div class="container">
        <div class="bg--bottom--images">
          <div class="form-content">
            <div class="d-flex-logo">
              <div class="lock--radius">
                <img src="images/lock.png" alt="" />
              </div>
            </div>
            <div class="margin--top--30 text-center">
              <h2 class="custm--link">User Registration</h2>
            </div>
      <form class="text-center" method = "post" action="{{ route('register') }}">    
              @csrf
              @if($errors->any())
              <p style="color: red">{{$errors->first('name')}}</p>
              @endif
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text color__white" id="basic-addon1"
                    ><i class="fa fa-user-o" aria-hidden="true"></i>
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control border-left--0"
                  placeholder="Name"
                  name="name"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                />
              </div>
              @if($errors->any())
              <p style="color: red">{{$errors->first('email')}}</p>
              @endif
               <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text color__white" id="basic-addon1"
                    ><i class="fa fa-envelope-o" aria-hidden="true"></i>
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control border-left--0"
                  placeholder="Email"
                  name="email"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                />
              </div>
              @if($errors->any())
              <p style="color: red">{{$errors->first('password')}}</p>
              @endif
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text color__white" id="basic-addon1"
                    ><i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
                </div>
                <input
                  type="password"
                  class="form-control border-left--0"
                  placeholder="Password"
                  name="password"
                  aria-label=""
                  aria-describedby="basic-addon1"
                />
              </div>
              @if($errors->any())
              <p style="color: red">{{$errors->first('password_confirmation')}}</p>
              @endif
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text color__white" id="basic-addon1"
                    ><i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
                </div>
                <input
                  type="password"
                  class="form-control border-left--0"
                  placeholder="Confirm Password"
                  name="password_confirmation"
                  aria-label=""
                  aria-describedby="basic-addon1"
                />
              </div>
              <div class="text__right--side">
                <a href="#" class="text-right custm--link">forgot password?</a>
              </div>

              <div class="mt-4">
                <button
                  type="submit"
                  class="btn btn-block color__orange custm--link"
                >
                  login
                </button>
              </div>
              <div class="mt-5">
                <p class="custm--link">
                  Already Have Accouunt?
                  <a href="{{ route('login') }}" class="pl-2 custm--link color__black"
                    >Sign In</a
                  >
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection    
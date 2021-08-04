@extends('layouts.master')
@section('content')

<!-- <style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style> -->

    <!--center area section -->
    <div class="site_wrap"> 

        <div class="tsrtopsection">     
            <div class="wrapper">
                    <div id="login-admin">
                    <form action="{{ route('login') }}" method="post">
                      @csrf
                       @if($errors->any())
                      <p style="color: red">{{$errors->first('email')}}</p>
                      @endif

                      <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" class="form-control border-left--0" placeholder="Email" name="email" aria-label="Username" aria-describedby="basic-addon1" required/>
                        <!-- <input type="text" placeholder="Enter Username" name="uname" required> -->

                        @if($errors->any())
                            <p style="color: red">{{$errors->first('password')}}</p>
                        @endif

                        <label for="psw"><b>Password</b></label>
                        <!-- <input type="password" placeholder="Enter Password" name="psw" required> -->
                        <input type="password" class="form-control border-left--0" placeholder="Password" name="password" aria-label="" aria-describedby="basic-addon1" />

                        <button type="submit">Login</button>
                        <!-- <label>
                          <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label> -->
                      </div>

                     <!--  <div class="container" style="background-color:#f1f1f1">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                      </div> -->
                    </form>
</div>

            </div>
        </div><!-- page banner area section -->

        
    </div>  
    <!--center area section --> 
@endsection
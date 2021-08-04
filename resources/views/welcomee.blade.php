@extends('layouts.main')
@section('content')

  <section class="main-page-banner">
    <div class="banner-inner">
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
      @endif 
      <h1>Welcome to our stainless steel bench top calculator</h1>
      <p>
       This calculator is for standard bench tops. Please contact Sales@allcor.co.nz if your bench top is outside the parameters of this calculator.
      </p>
      <button onclick="location.href = '/estimate';" id="myButton" class="btn start-btn" >start quote</button>
      <!-- <button class="btn start-btn" type="button">start estimate</button> -->
    </div>
  </section>
    <!-- ===================end banner================== -->
    <!-- ===================end banner================== -->

    <!--===================footer================== -->

@endsection

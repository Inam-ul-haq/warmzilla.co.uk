@extends('layouts.admin_app')
@section('main_content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{@$users}}</h3>
            <p>Total Users</p>            
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>


      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{@$estimates}}</h3>
            <p>Estimates</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{url('/estimate/show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{@$designs}}</h3>

            <p>Designs</p>
          </div>
          <div class="icon">
            <i class="fas fa-palette"></i>
          </div>
          <a href="{{url('/designs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{@$edges}}</h3>

            <p>Edges</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{url('/edges')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
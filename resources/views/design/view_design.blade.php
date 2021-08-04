@extends('layouts.admin_app')
@section('custom_style')
  <style type="text/css">
    .card_image{
      height: 250px;
    }
    .card_image img{
      height: -webkit-fill-available;
    }
    .designs_table tr{
      border-bottom: 1px solid grey;
    }
    .designs_table tr td{
      padding: 5px;
    }
    .design_table_title{
      font-weight: bold;
    }
  </style>
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Designs</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Designs</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Small boxes (Stat box) -->
        <div class="">
            @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Designs</h3>
                <a href="{{route('designs.create')}}" class="btn btn-primary float-right">Add Design</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="background-color: #f4f6f9; border: 3px solid white;">
                <div class="row">
                  @if(sizeof($designs)!=0)
                  @foreach($designs as $key => $design)
                    <div class="card col-md-4 p-3">
                      <table class="designs_table">
                        <tr class="text-center">
                          <td colspan="2" class="p-3 card_image">
                            <img src="{{asset('/images/designs/'.$design->filename)}}" class="img-thumbnail" max-width="100%"></td>
                        </tr>
                        <tr>
                          <td class="design_table_title">Name:</td>
                          <td>{{$design->name}}</td>
                        </tr>
                        <tr>
                          <td class="design_table_title">Description:</td>
                          <td>{{$design->description}}</td>
                        </tr>
                        <tr>
                          <td class="design_table_title">Dimension(s):</td>
                          <td>
                            @foreach($design->dimensions as $key => $dimension)
                              @if($key>0)
                               &nbsp;<b>,</b>&nbsp;
                              @endif
                              {{$dimension->name}}
                            @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td class="design_table_title">Actions:</td>
                          <td>
                            <span>
                              <a href="{{url('/designs/'.$design->id.'/edit')}}">
                                Edit
                              </a>
                            </span> | <span>
                              <a style="cursor: pointer;color: red;" onclick="deleteConfirm({{$design->id}},'{{$design->name}}')">Delete</a>
                                <form action="{{ url('/designs', ['id' => $design->id]) }}" method="post" id="delete{{$design->id}}">
                                  @method('delete')
                                  @csrf
                                </form>
                            </span></td>
                        </tr>
                      </table>
                    </div>
                  @endforeach
                  @else
                    <p class="text-center">No design added...!</p>
                  @endif
                  </div>
              </div>
            </div>
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script type="text/javascript">
function deleteConfirm(id,name){
    var confirmDelete = confirm("Are you sure, you want to delete edge '"+name+"' ?");
    var divId = "#deleteClick"+id;
    if(confirmDelete)
    {
      // $(divId)[0].click();
      $('form#delete'+id).submit();
    }else{

    }
  }
</script>
@endsection

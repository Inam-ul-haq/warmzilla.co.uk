@extends('layouts.admin_app')
@section('custom_style')
  <style type="text/css">
    .actions{
      display: none;
    }
    tr:hover .actions {
      display: block;
    }
    @keyframes slideInFromLeft {
      0% {
        transform: translateX(-100%);
      }
      100% {
        transform: translateX(0);
      }
    }
    .progress_trans {  
      /* This section calls the slideInFromLeft animation we defined above */
      animation: 2s ease-out 0s 1 slideInFromLeft;
    }
    .card_image{
      height: 250px;
    }
    .card_image img{
      height: -webkit-fill-available;
    }
    .edges_table tr{
      border-bottom: 1px solid grey;
    }
    .edges_table tr td{
      padding: 5px;
    }
    .edge_table_title{
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
                <h1 class="m-0 text-dark">Edges</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Edges</li>
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
                <h3 class="card-title">Edges</h3>
                <a href="{{route('edges.create')}}" class="btn btn-primary float-right">Add Edge</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="background-color: #f4f6f9; border: 3px solid white;">
                  <div class="row">
                  @if(sizeof($edges)!=0)
                  @foreach($edges as $key => $edge)
                    <div class="card col-md-4 p-3">
                      <table class="edges_table">
                        <tr class="text-center">
                          <td colspan="2" class="p-3 card_image">
                            <img src="{{asset('/images/edges/'.$edge->filename)}}" class="img-thumbnail" max-width="100%"></td>
                        </tr>
                        <tr>
                          <td class="edge_table_title">Name:</td>
                          <td>{{$edge->name}}</td>
                        </tr>
                        <tr>
                          <td class="edge_table_title">Price:</td>
                          <td>{{$edge->price}}</td>
                        </tr>
                        <tr>
                          <td class="edge_table_title">Description:</td>
                          <td>{{$edge->description}}</td>
                        </tr>
                        <tr>
                          <td class="edge_table_title">Actions:</td>
                          <td>
                            <span>
                              <a href="{{url('/edges/'.$edge->id.'/edit')}}">
                                Edit
                              </a>
                            </span> | <span>
                              <a style="cursor: pointer;color: red;" onclick="deleteConfirm({{$edge->id}},'{{$edge->name}}')">Delete</a>
                                <form action="{{ url('/edges', ['id' => $edge->id]) }}" method="post" id="delete{{$edge->id}}">
                                  @method('delete')
                                  @csrf
                                </form>
                            </span></td>
                        </tr>
                      </table>
                    </div>
                  @endforeach
                  @else
                    <p class="text-center">No edge added...!</p>
                  @endif
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right" style="display: none;">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script type="text/javascript">
  
function deleteConfirm(id,first_name,last_name){
    var confirmDelete = confirm("Are you sure, you want to delete edge "+first_name+" "+last_name+"?");
    var divId = "#deleteClick"+id;
    if(confirmDelete)
    {
      // $(divId)[0].click();
      $('form#delete'+id).submit();
    }else{

    }
  }
  
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

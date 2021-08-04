@extends('layouts.admin_app')

@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Boiler Types</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Boiler Types</li>
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
                <h3 class="card-title">Boiler Types</h3>
                <a href="{{route('boilertype.create')}}" class="btn btn-primary float-right">Add Boiler Type</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Boiler Type Name</th>
                      <th>Boiler Type Description</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(@$boilers)
                    @foreach(@$boilers as $key => $boiler)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$boiler->name}}</td>
                        <td>{{$boiler->description}}</td>
                        <td>{{$boiler->created_at}}</td>
                        <td>{{$boiler->updated_at}}</td>
                        <td width="10%" class="p-0 pt-3">
                            <div class="actions text-center">
                              <span>
                                <a href="{{url('/boilertype/'.$boiler->id.'/edit')}}">
                                  Edit
                                </a>
                              </span> | <span>
                                <a style="cursor: pointer;color: red;" onclick="deleteConfirm({{$boiler->id}},'{{$boiler->name}}')">Delete</a>
                                <a href="{{route('boilertype.destroy',$boiler->id)}}" id="deleteClick{{$boiler->id}}" style="color: red; visibility: hidden;"></a>
                                <form action="{{ url('/boilertype', ['id' => $boiler->id]) }}" method="post" id="delete{{$boiler->id}}">
                                  <!-- <input class="btn btn-default" type="submit" value="Delete" /> -->
                                  @method('delete')
                                  @csrf
                                </form>
                              </span>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
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
  
function deleteConfirm(id,name){
    var confirmDelete = confirm("Are you sure, you want to delete user "+name+"?");
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
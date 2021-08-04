@extends('layouts.admin_app')
@section('custom_style')
 <!--  <style type="text/css">
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
  </style> -->
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Estimates</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Estimates</li>
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
                <h3 class="card-title">Estimate</h3>
<!--                 <a href="#" class="btn btn-primary float-right">Options</a>
 -->              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>User</th>
                      <th>Finish Name</th>
                      <th>Finish Price</th>
                      <th>Edge Name</th>
                      <th>Edge Price</th>
                      <th>Design Name</th>
                      <th>Cooking Hub</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@if(sizeof($quotations)!=0)
                    @foreach($quotations as $key => $quotation)
                      <tr>
                        <td>{{$key+1}}</td>
                        @if(!empty($quotation->user))
                            <td>{{$quotation->user->first_name}}
                                {{$quotation->user->last_name}}
                            </td>
                        @else
                            <td></td>                            
                        @endif

                        <td>{{@$quotation->finish->name}}</td>
                        <td>{{@$quotation->finish->price}}</td>
                        <td>{{$quotation->edge->name}}</td>
                        <td>{{$quotation->edge->price}}</td>
                        <td>{{$quotation->design->name}}</td>
                        @if(!empty($quotation->cooking_hob_status))
                        <td>Length={{$quotation->cooking_hob_length}},
                            Width={{$quotation->cooking_hob_width}}
                        </td>
                        @else
                        <td>Not Select</td>
                        @endif
                         <td width="10%" class="p-0 pt-3">
                            <div class="actions text-center">
                              <span>
                                <a href="{{url('/estimate/'.$quotation->id.'/edit')}}">
                                  Edit
                                </a>
                              </span> | <span>
                                <a style="cursor: pointer;color: red;" onclick="deleteConfirm({{$quotation->id}} )">Delete</a>
                                <a href="{{route('estimate.destroy',$quotation->id)}}" id="deleteClick{{$quotation->id}}" style="color: red; visibility: hidden;"></a>
                                <form action="{{ url('/estimate', ['id' => $quotation->id]) }}" method="post" id="delete{{$quotation->id}}">
                                  @method('delete')
                                  @csrf
                                </form>
                              </span>
                            </div>
                        </td> 
                      </tr>
                    @endforeach
                     @else
                    <p class="text-center">No Data added...!</p>
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
        </div>
@endsection
@section('custom_scripts')
<script type="text/javascript">
  
function deleteConfirm(id,){
    var confirmDelete = confirm("Are you sure, you want to delete Estimate?");
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
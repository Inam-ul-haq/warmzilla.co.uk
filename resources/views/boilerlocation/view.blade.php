@extends('layouts.admin_app')

@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Boiler Installation Cities</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Boiler Installation Cities</li>
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
                <h3 class="card-title">Boiler Installation Cities</h3>
                <a href="{{route('boilerlocation.create')}}" class="btn btn-primary float-right">Add Boiler Installation Cities</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id = "location-table">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Boiler Installation Cities Name</th>
                      <th>Boiler Installation Cities Description</th>
                      <th>Image</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(@$boilerlocations)
                    @foreach(@$boilerlocations as $key => $boilerlocation)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$boilerlocation->location_name}}</td>
                        <td>{{$boilerlocation->location_description}}</td>
                        <td class="text-center">
                            <img src="{{($boilerlocation->filename)?asset('/images/boilerlocation/'.$boilerlocation->filename):asset('/images/no_image.jpg')}}" class="img-thumbnail" max-width="20%"  style = "height:100px;"></td>
                        </td>                     
                        <td>{{$boilerlocation->created_at}}</td>
                        <td>{{$boilerlocation->updated_at}}</td>
                        <td width="10%" class="p-0 pt-3">
                            <div class="actions text-center">
                              <span>
                                <a href="{{url('/boiler/boilerlocation/'.$boilerlocation->id.'/edit')}}">
                                  Edit
                                </a>
                              </span> | <span>
                                <a style="cursor: pointer;color: red;" onclick="deleteConfirm({{$boilerlocation->id}}, {{$boilerlocation->id}} )">Delete</a>
                                <a href="{{route('boilerlocationarea.destroy',$boilerlocation->id)}}" id="deleteClick{{$boilerlocation->id}}" style="color: red; visibility: hidden;"></a>
                                <form action="{{ url('/boiler/boilerlocation', ['id' => $boilerlocation->id]) }}" method="post" id="delete{{$boilerlocation->id}}">
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
              <!--<div class="card-footer clearfix">-->
              <!--  <ul class="pagination pagination-sm m-0 float-right" style="display: none;">-->
              <!--    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>-->
              <!--    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
              <!--    <li class="page-item"><a class="page-link" href="#">2</a></li>-->
              <!--    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
              <!--    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>-->
              <!--  </ul>-->
              <!--</div>-->
            </div>
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script type="text/javascript">
  
  $(document).ready( function () {
    $('#location-table').DataTable();
} ); 
  
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
  
function featured(e){

    var checked = 0;
        
        if ($('#'+e.id).is(':checked')){
             checked = 1;
        }
        
    $.ajax({
    	type: 'POST',
    	url : "{{route('featuredcat')}}",
    	data:{
    		_token      : '{{ csrf_token() }}',
    		boiler_id   :  e.value,
    		checked     :  checked,
    	},
    	success: function (data) {
            if(data== 'Can not featured more than 10'){
                $('#'+e.id).prop("checked", false);
                alert(data);    
                
            }else{
                alert(data);    
            }
    	}
});    
    
    
}  
  
</script>
@endsection

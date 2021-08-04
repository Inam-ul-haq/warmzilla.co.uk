

@extends('layouts.admin_app')
@section('custom_style')
  <style type="text/css">
   
  </style>
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
          <h1 class="m-0 text-dark">Boiler Model</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Boiler Model</li>
                </ol>
              </div><!-- /.col -->
                <div class="col-sm-6 ">
                </div>
                <div class="col-sm-6 ">
                      <a href="{{route('boilercategory.create')}}" class="btn btn-primary float-right">Add Boiler Model</a>
                </div>
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
               <h3 class="card-title">Boiler Models</h3>
                
                <input  type = "button" name = "search" value = "Search" class = "btn btn-primary float-right" onclick = "search()" />
                <input id = "searchbox" type = "text" name="search" value = "" class = " searchbox float-right"  style="height: 38px;" />
                
                
                
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                  <!--heresit-->
                  <table id = "boiler-table" class="table table-bordered">
                    <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Boiler Model Name</th>
                      <th>Boiler Model Description</th>
                      <th>Boiler Model Brand</th>
                      <th>Featured</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                   <tbody>
                    @if(@$boilercategories)
                    @foreach(@$boilercategories as $key => $boilercategory)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$boilercategory->name}}</td>
                        <td>{{$boilercategory->description}}</td>
                        <td>{{ @$boilercategory->brands->name}}</td>
                        <td class="text-center">
                            <input type = "checkbox" name= 'featured_{{$boilercategory->id}}' id= 'featured_{{$boilercategory->id}}' value = "{{$boilercategory->id}}" onclick = "featured(this)" class="text-center" 
                                {{ ($boilercategory->featured == 1)? 'checked' :'' }}/> 
                        </td>                        
                        <td>{{$boilercategory->created_at}}</td>
                        <td>{{$boilercategory->updated_at}}</td>
                        <td width="10%" class="p-0 pt-3">
                            <div class="actions text-center">
                              <span>
                                <a href="{{url('/boiler/boilercategory/'.$boilercategory->id.'/edit')}}">
                                  Edit
                                </a>
                              </span> | <span>
                                <a style="cursor: pointer;color: red;" onclick="deleteConfirm({{$boilercategory->id}}, {{$boilercategory->id}} )">Delete</a>
                                <a href="{{route('boilercategory.destroy',$boilercategory->id)}}" id="deleteClick{{$boilercategory->id}}" style="color: red; visibility: hidden;"></a>
                                <form action="{{ url('/boiler/boilercategory', ['id' => $boilercategory->id]) }}" method="post" id="delete{{$boilercategory->id}}">
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
                  <!--hrereend-->
              </div>
              <!-- /.card-body -->
        
              <div class="card-footer clearfix">
                
                
                        
                <ul class="pagination pagination-sm m-0 float-right" >
                <!--<ul class="pagination pagination-sm m-0 float-right" >-->
                  <li class="page-item"><a class="page-link" href=" #">&laquo;</a></li>
                
                    @if(sizeof($boilercategories)!=0)
                        @php $tot = $boilercategories->total()/10; 
                            $con = round($tot) ;
                        @endphp
                    @endif
                    @if(@$con)
                        @for ($i = 1; $i < $con+1; $i++)
                            <li class="page-item"><a class="page-link" href="{{url('boilercategory?page='.$i)}}">{{$i}}</a></li>
                        @endfor
                    @endif
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              //  Total: {{$boilercategories->total()}}
              </div>
            </div>
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
@endsection
@section('custom_scripts')
<script type="text/javascript">
  

  
function deleteConfirm(id,first_name,last_name){
    var confirmDelete = confirm("Are you sure, you want to delete boiler "+first_name+" "+last_name+"?");
    var divId = "#deleteClick"+id;
    if(confirmDelete)
    {
      // $(divId)[0].click();
      $('form#delete'+id).submit();
    }else{

    }
  }
  
function deleteConfirm(id,name){
    var confirmDelete = confirm("Are you sure, you want to delete boiler '"+name+"' ?");
    var divId = "#deleteClick"+id;
    if(confirmDelete)
    {
      // $(divId)[0].click();
      $('form#delete'+id).submit();
    }else{

    }
  }

function search(){
    
    var search = $('#searchbox').val();
    
    if(search != ''){
      var url = "{{ url('boilercategory' ) }}";
    url = url+'?search='+search;
    window.location.href = url;            
    }
}
  
function featured(e){

    var checked = 0;
        
        if ($('#'+e.id).is(':checked')){
             checked = 1;
        }
        
    $.ajax({
      type: 'POST',
      url : "{{route('featured')}}",
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


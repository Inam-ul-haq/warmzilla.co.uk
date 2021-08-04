<?php //echo "<pre>"; print_r($finishs->total()); exit('koko'); ?>

@extends('layouts.admin_app')
@section('custom_style')
  <style type="text/css">
    /*.actions{*/
    /*  display: none;*/
    /*}*/
    /*tr:hover .actions {*/
    /*  display: block;*/
    /*}*/
    /*@keyframes slideInFromLeft {*/
    /*  0% {*/
    /*    transform: translateX(-100%);*/
    /*  }*/
    /*  100% {*/
    /*    transform: translateX(0);*/
    /*  }*/
    /*}*/
    /*.progress_trans {  */
    /*  animation: 2s ease-out 0s 1 slideInFromLeft;*/
    /*}*/
    /*.card_image{*/
    /*  height: 250px;*/
    /*}*/
    /*.card_image img{*/
    /*  height: -webkit-fill-available;*/
    /*}*/
    /*.finish_table tr{*/
    /*  border-bottom: 1px solid grey;*/
    /*}*/
    /*.finish_table tr td{*/
    /*  padding: 5px;*/
    /*}*/
    /*.finish_table_title{*/
    /*  font-weight: bold;*/
    /*}*/
  </style>
@endsection
@section('main_content')
<div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Boiler</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('boiler/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Boiler</li>
                </ol>
              </div><!-- /.col -->
                <div class="col-sm-6 ">
                </div>
                <div class="col-sm-6 ">
                    <a href="{{route('finish.create')}}" class="btn btn-primary float-right">Add Boiler</a>
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
                <h3 class="card-title">Boiler</h3>
                
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
                      <th>Boiler Name</th>
                      <th>Price</th>
                      <th>KW output</th>
                      <th>Brand</th>
                      <th>Category</th>
                      <th>Boiler Image</th>
                      <th>Fuel Type</th>
                
                      <th>Updated at</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(sizeof($finishs)!=0)
                    @foreach(@$finishs as $key => $finish)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ @$finish->name}}</td>
                        <td>{{ @$finish->price}}</td>
                        <td>{{ @$finish->kwoutput}}</td>
                        <td>{{ @$finish->brands->name}}</td>
                        <td>{{ @$finish->category->name}}</td>
                        <td class="text-center">
                            <img src="{{($finish->filename)?asset('/images/finish/'.$finish->filename):asset('/images/no_image.jpg')}}" class="img-thumbnail" max-width="20%"  style = "height:100px;"></td>
                        </td>
                        <td>
                            @if(@$finish->fuel_type) 
                                @if($finish->fuel_type ==1 )
                                    Gas
                                @elseif($finish->fuel_type ==2)
                                    Oil
                                @elseif($finish->fuel_type ==3)
                                    LPG
                                @endif
                            @endif
                        </td>
             
                        <td>{{$finish->updated_at}}</td>
                        <td width="10%" class="p-0 pt-3">
                            <div class="actions text-center">
                              <span>
                                <a href="{{ url('/boiler/finish/'.$finish->id.'/edit')}}">
                                  Edit
                                </a>
                              </span> | 
                              <span>
                                <a style="cursor: pointer;color: red;" onclick="deleteConfirm({{$finish->id}},'{{$finish->name}}')">Delete</a>
                                <form action="{{ url('/boiler/finish', ['id' => $finish->id]) }}" method="post" id="delete{{$finish->id}}">
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
                
                    @if(sizeof($finishs)!=0)
                        @php $tot = $finishs->total()/10; 
                            $con = round($tot) ;
                        @endphp
                    @endif
                    @if(@$con)
                        @for ($i = 1; $i < $con+1; $i++)
                            <li class="page-item"><a class="page-link" href="{{url('finish?page='.$i)}}">{{$i}}</a></li>
                        @endfor
                    @endif
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
                Total: {{$finishs->total()}}
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
    	var url = "{{ url('finish' ) }}";
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
  
</script>


@endsection


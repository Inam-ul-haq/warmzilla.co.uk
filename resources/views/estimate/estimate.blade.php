@extends('layouts.main')
<style type="text/css">
  input[type=checkbox] {
    display:none;
  }
  .disabled:hover, .disabled>a:hover{
    cursor: not-allowed!important;
  }
  h3{
    margin-bottom: 15px!important;
    text-decoration: underline;
  }
  h6{
    text-overflow: ellipsis; 
    overflow: hidden; 
    white-space: nowrap;
  }
  .dimensions{
    /*border:1px solid black;*/
  }
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
#dimensions_inputs td{
  padding: 5px;
}
.selected_design{
  text-align: center;
  border-right: 1px solid grey;
}
.selected_design img{
  width: 300px;
  height: 300px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 10px;  
}
#selected_design_and_dimensions{
  border: 2px solid black;
}



/*bilal*/
.features_hding{
    font-weight: bold !important;
}
.thiknes_input input , select{
    width: 15% !important;
    display: inline-block !important;
}
.thiknes_input input{
  background-color: white !important;
}
.sink_bol_dv , .hob_cut_dv{
    display: none;
    margin-top: 20px;
}
.option_switch_btn{
  position: absolute !important;
  left: 35% !important;
}
.hob_width{
    margin-left: 30px;
}
#tab5 h3{
  text-align: center;
}
.estimate_dv{
  text-align: center;
  margin-bottom: 50px !important;
}
.estimate_dv p{
  width: 45%;
  margin: auto;
  margin-bottom: 35px;
}
.total_price ul span{
    padding-left: 10px;
    padding-right: 10px;
}
.total_price ul{
  display: flex;
  list-style-type: none;
  margin-left: -45px;
  margin-bottom: 0px !important;
}
.total_price ul li{
  margin-left: 5px;
}
.total_price{
  text-align: left;
  box-shadow: 0px 2px 7px 0px rgb(50 50 50 / 75%);
  padding: 15px;
  width: 65%;
  margin:auto;
}



.estimate_feildset {
    border: solid 1px #DDD !important;
    padding: 0 30px 0px 30px;
}
.estimate_feildset legend {
    width: auto !important;
    font-weight: bold;
  }
  .estimate_feildset img{
    width: 150px;
    height: 150px;
  }
  .estimate_feildset span{
    font-weight: bold;
    margin-top: 30px;
  }
  .estimate_item_rw{
    border-bottom: 1px solid lightgray;
    padding-top: 10px;
    padding-bottom: 20px;
  }
  .estimate_rw{
    border-bottom: none !important;
  }
  .estimate_rw ol{
    list-style-type: circle;
    padding-left: 0px !important;
  }
  .estimate_rw ol li:first-child{
    list-style-type: none !important;
    margin-left: -17px;
  }
  .size_list{
    list-style-type: none !important;
  }
  .size_list li:first-child{
    margin-left: 0px !important;
  }
  .thickness_price{
    width: 3% !important;
    border: none !important;
    padding-left: 2px !important;
    font-weight: bold;
  }
  .thickness_p{
    font-weight: bold;
    margin-left: 30px;
  }

  .double_sink_bowl_append_dv{
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .single_sink_bowl_append_dv{
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .double_sink_bowl_append_dv input{
    margin-left: 10px;
    margin-right: 5px;
  }
  .single_sink_bowl_append_dv input{
    margin-left: 10px;
    margin-right: 5px;
  }
  .double_sink_bowl_append_dv p{
    margin-bottom: 10px;
    margin-top: 10px;
  }

  .double_sink_bowl_append_dv input{
    margin-left: 10px;
    margin-right: 5px;
     width: 25% !important;
  }
  .single_sink_bowl_append_dv input{
    margin-left: 10px;
    margin-right: 5px;
    width: 25% !important;
  }
  .double_sink_bowl_append_dv p{
    margin-bottom: 10px;
    margin-top: 10px;
  }

  .sink_bowl_dimensions{
    padding-top: 53px;
  }
  .sink_bowl_dimensions select{
    width: 25% !important;
    margin-left: 2px;
  }
  .sink_bowl_dimensions{
    display: none;
  }
  .single_sink_bowl_append_dv p{
    margin-bottom: 10px;
    margin-top: 10px;
  }
  
   .lable_height{
    display: none;
  }
</style>
@section('content') 
     <section class="estimate-tabs">
      <div class="container">
        <form action="{{route('estimate.store')}}" method="POST" id="estimate_form">
          @csrf
          <div id="exTab1" class="wizard">
            <ul class="nav nav-pills scrollbar" role="tablist">
              <li class="nav-item custom__tabs">
                <a class="nav-link active" data-toggle="pill" href="#tab1"
                  ><badge class="badge-tabs">1</badge> Finish</a
                >
              </li>
              <li class="nav-item custom__tabs disabled">
                <a class="nav-link" data-toggle="pill" href="#tab2">
                  <badge class="badge-tabs">2</badge> Edge Profile</a
                >
              </li>
              <li class="nav-item custom__tabs disabled">
                <a class="nav-link" data-toggle="pill" href="#tab3">
                  <badge class="badge-tabs">3</badge> Measurements</a
                >
              </li>
              <li class="nav-item custom__tabs disabled">
                <a class="nav-link" data-toggle="pill" href="#tab4">
                  <badge class="badge-tabs">4</badge>
                  Options</a
                >
              </li>
              <li class="nav-item custom__tabs disabled">
                <a class="nav-link" data-toggle="pill" href="#tab5">
                  <badge class="badge-tabs">5</badge>
                  Quote</a
                >
              </li>
            </ul>

            <div class="tab-content clearfix">
              <div class="tab-pane active" id="tab1">
                <h3>Finish Profile</h3>
                <div class="card-main">
                  @foreach($finishes as $key => $finish)
                  <style type="text/css">
                    input#finish{{$key}}[type=checkbox] + label
                    {
                      background-image: url("{{($finish->filename)?asset('images/finish/'.$finish->filename):asset('images/no_image.jpg')}}");
                      border-color: white;
                      border-style: solid;
                      height: 100%;
                      width: 100%;
                      background-repeat: no-repeat;
                      background-size: cover;
                      display:inline-block;
                      padding: 0 0 0 0px;
                    }
                    input#finish{{$key}}[type=checkbox]:checked + label
                    {
                      border-color: red;
                      border-style: solid;
                      height: 100%;
                      display:inline-block;
                      padding: 0 0 0 0px;
                    }
                  </style>
                  <div class="card">
                    <div class="card-figure">
                      <input type="checkbox" name='finish' value="{{$finish->id}}" class="finish_checkboxes" id="finish{{$key}}" {{($key==0)?'checked':''}} /><label for="finish{{$key}}" class="finish_checkboxess"></label>
                      <!-- <img src="{{($finishes[0]->filename)?asset('images/finish/'.$finishes[0]->filename):asset('images/no_image.jpg')}}" alt="card" /> -->
                    </div>

                    <h6>{{$finish->name}}</h6>
                  </div>
                  @endforeach

                  <div class="action-grid">
                    <button type="button" class="btn btn-next next-step next_finish">Next</button>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab2">
                <h3>Edge Profile</h3>
                <div class="card-main">
                  @foreach($edges as $key => $edge)
                  <style type="text/css">
                    input#edge{{$key}}[type=checkbox] + label
                    {
                      background-image: url("{{($edge->filename)?asset('images/edges/'.$edge->filename):asset('images/no_image.jpg')}}");
                      border-color: white;
                      border-style: solid;
                      height: 100%;
                      width: 100%;
                      background-repeat: no-repeat;
                      background-size: contain;
                      background-position: center;
                      display:inline-block;
                      padding: 0 0 0 0px;
                    }
                    input#edge{{$key}}[type=checkbox]:checked + label
                    {
                      border-color: red;
                      border-style: solid;
                      height: 100%;
                      display:inline-block;
                      padding: 0 0 0 0px;
                    }
                  </style>
                  <div class="card">
                    <div class="card-figure">
                      <input type="checkbox" name='edge' value="{{$edge->id}}" class="edge_checkboxes edge_checkboxes_style" id="edge{{$key}}" {{($key==0)?'checked':''}} /><label for="edge{{$key}}" class="edge_checkboxess"></label>
                    </div>

                    <h6>{{$edge->name}}</h6>
                  </div>
                  @endforeach
                </div>
                <div class="action-grid">
                  <button type="button" class="btn btn-prev prev-step float-left">Previous</button>
                  <button type="button" class="btn btn-next next-step">Next</button>
                </div>
              </div>
              <div class="tab-pane" id="tab3">
                <h3>Design Profile</h3>
                <div class="card-main">
                  @foreach($designs as $key => $design)
                  <style type="text/css">
                    input#design{{$key}}[type=checkbox] + label
                    {
                      background-image: url("{{($design->filename)?asset('images/designs/'.$design->filename):asset('images/no_image.jpg')}}");
                      border-color: white;
                      border-style: solid;
                      height: 100%;
                      width: 100%;
                      background-repeat: no-repeat;
                      background-size: 100% 100%;
                      display:inline-block;
                      padding: 0 0 0 0px;
                     /* position: relative;*/
                      top: 25%;
                    }
                    input#design{{$key}}[type=checkbox]:checked + label
                    {
                      border-color: red;
                      border-style: solid;
                      height: 100%;
                      width: 100%;
                      display:inline-block;
                      padding: 0 0 0 0px;
                    }
                  </style>
                  <div class="card">
                    <div class="card-figure">
                      <input type="checkbox" name="design" value="{{$design->id}}" class="design_checkboxes" id="design{{$key}}"/><label for="design{{$key}}" style="cursor: pointer;" class="design_checkboxess"></label>
                    </div>

                    <h6>{{$design->name}}</h6>
                  </div>
                  @endforeach
                </div>
                  <div class="row" id="selected_design_and_dimensions">
                    
                  </div>
                <div class="action-grid">
                  <button type="button" class="btn btn-prev prev-step float-left">Previous</button>
                  <button type="button" class="btn btn-next next-step dimension_next design_next_btn" disabled="">Next</button>
                </div>
              </div>
              <div class="tab-pane" id="tab4">
                <h3>Estimate tabs 4</h3>

                    <div class="form-group">
                        <p class="features_hding">Substrate</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="substrate" value="MDF" checked>
                            <label class="form-check-label">MDF</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="substrate" value="Marine Ply">
                            <label class="form-check-label">Marine Ply</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="features_hding">Thickness (mm)</label>
                        <div class="thiknes_input">
                          <label>Select Size</label>
                            <select class="form-control thickness_dropdown" name="thickness_size">
                             @php
                                $thickness = json_decode(getOption('thickness')->value);
                                $thickness_id = json_decode(getOption('thickness')->id);
                              @endphp
                              @foreach($thickness->sizes as $key => $val)
                                <option value="{{$thickness->price[$key]}}">{{$val}}</option>
                              @endforeach
                            </select>
                            <span class="thickness_p">
                              <!-- $ -->
                              <input type="hidden" class="form-control thickness_price" value="{{$thickness->price[0]}}" name="thickness" readonly>
                            </span>
                            <input type="hidden" value="{{$thickness->sizes[0]}}" class="thickness_size" name="thickness_size">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="features_hding">Do you wish to include Allcor pressed drainer?</label>
                            <label class="switch option_switch_btn"> 
                            <input type="checkbox" class=" switch_side" name="pressed_drainer" value = "1" style="margin-left: 20px;"> 
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="features_hding">Sink Bowl</label>
                        <label class="switch option_switch_btn"> <input type="checkbox" class="swith_sink_bowl switch_side" name="sink_bowl_swith_btn"> <span class="slider round"></span> </label>
                        <div class="sink_bol_dv">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input single_sink_bowl" type="radio" name="sink_bowl" value="Single Sink Bowl" checked>
                                <label class="form-check-label">Single Sink Bowl</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input double_sink_bowl" type="radio" name="sink_bowl" value="Double Sink Bowl">
                                <label class="form-check-label">Double Sink Bowl</label>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 sink_bowl_append"></div>
                          <div class="col-sm-6 append">
                          </div>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label class="features_hding">Cooking Hob Cut Out</label>
                        <label class="switch option_switch_btn"> <input type="checkbox" id="" class="swith_hob_btn switch_side" name="hob_cut_swith_btn"> <span class="slider round"></span> </label>
                        <div class="hob_cut_dv">
                            <div class="thiknes_input">
                                <label>Length</label>
                                <input type="number" class="form-control hob_length hob_btn_input" min="1" name="hob_length">
                                <span>mm</span>

                                <label class="hob_width">Width</label>
                                <input type="number" class="form-control hob_width hob_btn_input" min="1" name="hob_width">
                                <span>mm</span>
                                
                            </div>
                        </div>
                    </div>

                <div class="action-grid">
                  <button type="button" class="btn btn-prev prev-step float-left">Previous</button>
                  <button type="button" class="btn btn-next next-step create_estimate_btn">Next</button>
                </div>
              </div>
              <div class="tab-pane" id="tab5">
                <div class="estimate_summary" id="estimate_summary"></div>
                <div class="action-grid">
                  <button type="button" class="btn btn-prev prev-step float-left">Previous</button>
                  <button type="button" class="btn btn-next next-step" id="estimate_submit_btn">Submit</button>
                  <button type="button" class="btn" id="estimate_print">Print</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- ===================end banner================== -->
    <!-- ===================end banner================== -->

    <!--===================footer================== -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.dimension_next').on('click',function(){
    // alert($('.dimension_input').val());
    return false;
  });

  $('.custom__tabs').click(function(){
    if(this.closest('.disabled')){
      return false;
    }
  });
  $('.finish_checkboxes').on('click',function(){
    $('.finish_checkboxes').not(this).prop('checked', false);
    if ($(".finish_checkboxes").is(":checked"))
    {
      $(".btn-next").attr('disabled',false);
    }else{
      event.preventDefault();
      // $(".btn-next").attr('disabled',true);
    }
  });
  $('.edge_checkboxes').on('click',function(event){
    $('.edge_checkboxes').not(this).prop('checked', false);
    if ($(".edge_checkboxes").is(":checked"))
    {
      $(".btn-next").attr('disabled',false);
    }else{
      event.preventDefault();
      // $(".btn-next").attr('disabled',true);
    }
  });
  $('.design_checkboxes').on('click',function(){
    $('.design_checkboxes').not(this).prop('checked', false);
    if ($(".design_checkboxes").is(":checked"))
    {
      var design_id = this.value;
      $.ajax({
        type: 'POST',
        url: '{{url("/getDimensions")}}',
        data: {
          _token: '{{csrf_token()}}',
          design_id:design_id,
        }
      }).done(function(data){
        $('#selected_design_and_dimensions').html(data);
        $(".dimension_next").attr('disabled',true);
        //   console.log(data);
        })
    }else{
      event.preventDefault();
      // $(".btn-next").attr('disabled',true);
    }
  });
  // $('.custom__tabs').on('click',function(){
  //  var tab2 = $("a .nav-link").find(".active");
  //  console.log(tab2);
  // });

  $(document).ready(function () {
    //Wizard
  //     $("#selected_design_and_dimensions,input").on('keypress',function(){
  //   console.log($('.dimension_inputs'));
  // });

    $('a[data-toggle="pill"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        var $active = $('.wizard .custom__tabs a.active');
        $active.parent().next().removeClass('disabled');
        nextTab($active);
        var key = $active.parent().next().attr("class");
        if(key == "nav-item custom__tabs tbs"){
            $(".dimension_next").attr('disabled',true);
        }else{
            event.preventDefault();
        }
    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .custom__tabs a.active');
        prevTab($active);

    });
  });

  function nextTab(elem) {
  //   console.log($(elem).parent().next());
      $(elem).parent().next().find('a[data-toggle="pill"]').click();
  }
  function prevTab(elem) {
      var ss = $(elem).parent().prev().find('a[data-toggle="pill"]').click();
      $(".btn-next").attr('disabled',false);

  }
  $('body').on('keyup change','.dimension_input',function(){
      var all_input = $('body').find('.dimension_input');
      $(all_input).each(function( index, value ){
        if (value.value == "") {
            isValid = false;
            return false;
        }else{
          isValid = true;
        }
      });
      if(isValid){
        $(".dimension_next").attr('disabled',false);
      }else{
        $(".dimension_next").attr('disabled',true);
      }
  });

    // use for sink bowl button present on options tab4
    $(".swith_sink_bowl").change(function(){
      if($(this).prop("checked") == true){
        $('.create_estimate_btn').attr('disabled' , true);
          $('body').find('.sink_bol_dv').show();
          $('body').find('.double_sink_bowl').prop("checked" , false);
          $('body').find('.single_sink_bowl').prop('checked',true);
          $('body').find('#single_sink_bowl_insert_id').val(1);
          $('.sink_bowl_append').append('<div class="single_sink_bowl_append_dv"><div class="thiknes_input"><p>First Sink Bowl Lenght Width</p><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]"><span>mm</span></div></div>');
          $('body').find('.sink_bowl_dimensions').show();
      }else{
          $('body').find('.sink_bol_dv').hide();
          $('body').find('.sink_bowl_append').html('');
          $('.create_estimate_btn').attr('disabled' , false);
          $('body').find('.sink_bowl_dimensions').hide();
      }
    });

     $('body').on('keyup change','.sink_bowl_input',function(){
      var all_input = $('body').find('.sink_bowl_input');
      $(all_input).each(function( index, value ){
        if (value.value == "") {
            isValid = false;
            return false;
        }else{
          isValid = true;
        }
      });
      if(isValid){
        $(".create_estimate_btn").attr('disabled',false);
      }else{
        $(".create_estimate_btn").attr('disabled',true);
      }
  });
    // use for Cooking Hob Cut Out button present on options tab4
    $(".swith_hob_btn").change(function(){
        if($(this).prop("checked") == true){
            $('body').find('.hob_cut_dv').show();
            $('.create_estimate_btn').attr('disabled' , true);
        }else{
            $('body').find('.hob_cut_dv').hide();
            $('.create_estimate_btn').attr('disabled' , false);
        }
    });
    $('body').on('keyup change','.hob_btn_input',function(){
      var all_input = $('body').find('.hob_btn_input');
      $(all_input).each(function( index, value ){
        if (value.value == "") {
            isValid = false;
            return false;
        }else{
          isValid = true;
        }
      });
      if(isValid){
        $(".create_estimate_btn").attr('disabled',false);
      }else{
        $(".create_estimate_btn").attr('disabled',true);
      }
  });
//for backsplach height
$('body').on('change','.switch_side_height',function(){
    // alert(this.id);
    var dynmic_class = this.id; 
    // alert(dynmic_class);
       if($(this).prop("checked") == true){
            $('body').find('.'+dynmic_class).show();
            $('body').find('.'+dynmic_class).show();
        }else{
            $('body').find('.'+dynmic_class).hide();
            $('body').find('.'+dynmic_class).val('');
           // $('body').find('.'+dynmic_class).hide();
        }
    });



  // get form data through ajax for create estimate
  $(".create_estimate_btn").on('click' , function(e) {
  var url = '{{url("/create_estimate")}}';
  $.ajax({
         type: "POST",
         url: url,
         data: $('body').find('#estimate_form').serialize(),
         success: function(data)
         {
            $('body').find('.estimate_summary').html(data);
         }
       });
  });

  // ajax use when estimate submit
  $("#estimate_submit_btn").on('click' , function(e) {
  var url = '{{url("/estimate_submit")}}';
  $.ajax({
         type: "POST",
         url: url,
         data: $('body').find('#estimate_form').serialize(),
         success: function(data){
          if (data == 'true') {
            // use for email
            var url = '{{url("/send_mail")}}';
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $('body').find('#estimate_form').serialize(),
                   success: function(data){

                    if (data == 'Email is send') {
                       window.location.href = 'home_msg';
                    }
                   
                  }
                });
            }
          }
       });
  });


  $("#estimate_print").on('click' , function(e) {
    window.print();
    // var newWindow = window.open();
    // newWindow.document.open();
    // newWindow.document.write('<html><link rel="stylesheet" href="{{ asset('css/print_style.css') }}" type="text/css" />' + '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');

    // newWindow.document.write('<body onload="window.print();" onfocus="window.setTimeout(function() { window.close(); }, 100);">');
    // newWindow.document.write(document.getElementById('estimate_summary').innerHTML);
    // newWindow.document.write('</body></html>');
    // newWindow.document.close();
    // newWindow.focus();

  });
  
  $(".thickness_dropdown").on('change' , function(e) {
  var size = $('option:selected', $(this)).text();
  var value = $(this).val();
  $('body').find('.thickness_price').val(value);
  $('body').find('.thickness_size').val(size);
  })  



$(".double_sink_bowl").change(function(){
    $('body').find('.sink_bowl_append').html('');
    $('body').find('#double_sink_bowl_insert_id').val(1);
    $('body').find('#single_sink_bowl_insert_id').val(0);
    $('.create_estimate_btn').attr('disabled' , true);
      $('.sink_bowl_append').append('<div class="double_sink_bowl_append_dv"><div class="thiknes_input"><p>First Sink Bowl Lenght Width</p><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][width][]"><span>mm</span></div><div class="thiknes_input"><p>Second Sink Bowl Lenght Width</p><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[double][width][]"><span>mm</span></div></div>');
    });

  $(".single_sink_bowl").change(function(){
    $('body').find('.sink_bowl_append').html('');
    $('body').find('#double_sink_bowl_insert_id').val(0);
    $('body').find('#single_sink_bowl_insert_id').val(1);
    $('.create_estimate_btn').attr('disabled' , true);
      $('.sink_bowl_append').append('<div class="single_sink_bowl_append_dv"><div class="thiknes_input"><label>Length</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][length][]"><span>mm</span><label class="hob_width">Width</label><input type="number" class="form-control sink_bowl_input" min="1" name="sink_bowl[single][width][]"><span>mm</span></div></div>');
    });

  $(".design_next_btn").on('click' , function(e) {
  var url = '{{url("/show_dimensions")}}';
  $.ajax({
         type: "POST",
         url: url,
         data: $('body').find('#estimate_form').serialize(),
         success: function(data){
            $('body').find('.append').html(data);
          }
       });
  });
</script>
@endsection

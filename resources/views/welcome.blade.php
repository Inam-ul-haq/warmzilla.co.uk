@extends('layouts.master')
@section('content')

    <!--center area section -->
    <div class="site_wrap"> 


@include('layouts.banner')
        <div class="getyourcode">
            <div class="wrapper">
                <div class="getcode-cntnt">
                    <p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
                    <a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
                </div>
            </div>
        </div><!-- get your quote -->

        <div class="tsr03">
            <div class="wrapper">
                <div class="row">
                    <div class="full-width cbox">
                        <div class="img">
                            <!-- <img src="{{asset('images/02.png')}}" width="138" height="293" alt="" title=""> -->
                             <?php  
                            $mainpage_image1 = getOption('mainpage_image1'); 
                               if($mainpage_image1){
                                  $image1 = $mainpage_image1->value;
                                //   echo $questionsHtml;
                               }
                        ?>  
                        <img src="{{ (@$image1)?asset('images/boilerfinance/'.$image1):asset('images/compareboiler-img.png') }}" width="138" height="293" alt="compareboiler-img" title="">
                        </div>
                        <div class="content">
                            <div id="article">
                            <?php  
                               $questions = getOption('questions'); 
                               if($questions){
                                  $questionsHtml = $questions->value;
                                  echo $questionsHtml;
                               }
                            ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- boiler brand -->

        <div class="tsr04">
            <div class="wrapper">
                <div class="head-para">
                    <h2>Choose a <span>Boiler Brand</span></h2>
                   <!--  <p>Choose a <a href="#">boiler brand</a> to view more information, you can also view all <a href="#">boiler models</a> available in combi, system and regular types.</p> -->
                     <?php  
                       $questions = getOption('titlehome_firstcontainer'); 
                       if($questions){
                          $questionsHtml = $questions->value;
                          echo $questionsHtml;
                       }
                    ?>
                </div>
                <div class="row">
                    <div class="full-width">
                        <div class="cbrands">
                            <ul>
                                @if(@$brands)
                                    @foreach($brands as $brand)
                                        <li>
                                            <div class="item">
                                                <div class="img">
                           <img src="{{($brand->filename)?asset('images/boilerbrand/'.$brand->filename):asset('images/l1.png')}}" width="175" height="70" alt="boilerbrand" title="">
                                                </div>
                                                <h5>{{@$brand->name}}</h5>
                                                <p>{{@$brand->description}}</p>
                                                <a href="{{url('boiler/boiler-brand/'.$brand->slug)}}"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                            </div>
                                        </li>                                        
                                    @endforeach
                                @else
                                    <center>No Brand Available </center>
                                @endif

<!--                                 <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{asset('images/l1.png')}}" width="175" height="70" alt="" title="">
                                        </div>
                                        <h5>Alpha Boilers</h5>
                                        <p>Combi, System & Regular boilers</p>
                                        <a href="brands.php"> <img src="{{asset('images/src.png')}}" width="19" height="19" alt="" title=""> View this Brand </a>
                                    </div>
                                </li> -->
                            </ul>
                        </div>      
                    </div>
                </div>
            </div>  
        </div><!-- brands -->

        <div class="getyourcode">
            <div class="wrapper">
                <div class="getcode-cntnt">
                    <p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
                    <a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
                </div>
            </div>
        </div><!-- get your quote -->

    </div>  
    <!--center area section --> 
@endsection
<?php 
// echo "<pre>"; print_r($boiler); exit('kko'); 
?>

@extends('layouts.master')
@section('content')

    <div class="site_wrap tsr09">           
        <div class="wrapper">
            <div class="row">
                <div class="bmodal-top">
                    <h2>{{ @$boiler->name }} </h2>
                    <ul class="twobtns">
                        <li><a href=" {{ url('boiler/boiler-brand/'. @$boiler->brands->slug ) }} ">View all {{ @$boiler->brands->name }} </a></li>
                        <li><a href="#" onclick = compare({{ @$boiler->id  }}) >Compare this Boiler</a></li>
                    </ul>
                </div>
                <div class="bmtop-box">
                    <figure>
                        <img src="{{ asset('images/finish/'.@$boiler->filename ) }}" width="226" height="379" alt="" title="">
                        <figcaption><a href="{{ @$boiler->brochure_url }}"  >+ view manual</a></figcaption>
                    </figure>
                    <div class="bmtopb-cntnt">
                        <div id="article-boiler">
                        <h3>{{ @$boiler->name }} </h3>
                        <p>
<!--                            The Worcester Greenstar Life 30kW, AKA ‘The Beautiful Beast’ comes in two stylish high gloss colours of black and white to suit its surroundings. It’s a condensing combi boiler that is suitable for flats and smaller homes.-->
<!--                            <br>-->
<!--                            <br>-->
<!--It’s also available in 35kW, 40kW, 45kW and 50kW to suit homes with higher hot water and heating demands.-->
                        
                        @php
                            if($boiler->description != ''){
                                echo $boiler->description;
                            }
                        @endphp                     
                        
                        
                        </p>
                    </div>
                        <!--<div class="bmtbc-brand">-->
                        <!--    <img src="{{ asset('images/finish/'.@$boiler->filename ) }}" width="156" height="35" alt="" title="">-->
                        <!--    <img src="{{(@$boiler->brands->filename)?asset('images/boilerbrand/'.$boiler->brands->filename):asset('images/brand.png')}}" style = "width:156px; height:35px;" alt="" title="" />-->
                        <!--</div>-->
                        <ul class="twobtns">
                            <li><a href="https://www.warmzilla.co.uk/find-a-boiler">Get your Quote</a></li>
                            <li><a href="#" onclick = compare({{ @$boiler->id  }})  >Compare this Boiler</a></li>
                        </ul>
                    </div>
                </div>
                <div class="giveaway">
                    <!--<p>-->
                    <!--    We refund the cost of every 1 in 100 boilers we sell. Could you be our 1 in 100?-->
                    <!--</p>-->
                    <!--<img src="{{ asset('images/giveaway.png') }} " width="352" height="148" alt="" title="">-->
                </div>
                <div class="ttf">
                    <div class="tleft">
                        <h4>Key Facts</h4>
                    </div>
                    <div class="tright">
                        <div class="faqs-wrap keyfacts">
                            <div id="accordion2" class="accordion-container">
                                <article class="content-entry2">
                                    <h4 class="article-title2"><i></i>Boiler Model</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        <p>{{ @$boiler->name }} </p>
                                    </div>
                                    <!--/.accordion-content-->
                                </article><article class="content-entry2">
                                    <h4 class="article-title2"><i></i>Dimensions (mm)</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        <p>{{ @$boiler->dimensions }}</p>
                                    </div>
                                    <!--/.accordion-content-->
                                </article>
                                <article class="content-entry2">
                                    <h4 class="article-title2"><i></i>Flow Rate</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        <p> <?php
                                        $flowrate = (float)$boiler->flowrate;
                                        
                                            if($flowrate == 0)
                                            {
                                              echo  $boiler->flowrate;   
                                              
                                            }else
                                            {
                                              $flowrate = $flowrate.' '. "(LPM)";
                                               echo  $flowrate;   
                                            }
                                         ?></p>
                                    </div>
                                    <!--/.accordion-content-->
                                </article>
                                <article class="content-entry2">
                                    <h4 class="article-title2"><i></i>kW Output</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        <p>{{ @$boiler->kwoutput}}</p>
                                    </div>
                                    <!--/.accordion-content-->
                                </article>
                                <article class="content-entry2">
                                    <h4 class="article-title2"><i></i>ErP Rating</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        <p>{{ @$boiler->erprating }} </p>
                                    </div>
                                    <!--/.accordion-content-->
                                </article>
                                <article class="content-entry2">
                                    <h4 class="article-title2"><i></i>Features</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        @php
                                            if($boiler->features != ''){
                                                echo $boiler->features;
                                            }
                                        @endphp
                                    </div>
                                    <!--/.accordion-content-->
                                </article>
                                <article class="content-entry2">
                                    <h4 class="article-title2"><i></i>Warranty</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        <p>Manufacturer’s Warranty - {{ @$boiler->warranty }} years</p>
                                    </div>
                                    <!--/.accordion-content-->
                                </article>
                                <article class="content-entry2">
                                    <h4 class="article-title2"><i></i>Energy Efficiency</h4>
                                    <div class="accordion-content2" style="display: block;">
                                        <p>{{ @$boiler->energyefficiency }}</p>
                                    </div>
                                    <!--/.accordion-content-->
                                </article>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site_wrap tsr10">
        <div class="wrapper2">
            <div class="row">
                <div class="licp align-items-center">
                    <div class="lic hidden-mobile">
                        
                        <img src="{{($boiler->review_img1)?asset('images/finish/'.$boiler->review_img1):asset('images/lic.png')}}">

                    </div>
                    <div class="licm">
                        <h4>{{ @$boiler->name }}  - Which? Review</h4>
                        @php
                            if($boiler->review_section){
                                echo $boiler->review_section;
                            }
                        @endphp
                        <div class="lic hidden-desktop">
                        
                        <img src="{{($boiler->review_img1)?asset('images/finish/'.$boiler->review_img1):asset('images/lic.png')}}">

                    </div>
                        <div class="lic lic-2 hidden-desktop">

                        <span>Review Score</span><div>{{ @$boiler->review }}<em>%</em></div>
                        <!--<img src="{{($boiler->review_img2)?asset('images/finish/'.$boiler->review_img2):asset('images/lic.png')}}">-->
                    </div>
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>-->
                        <a href="https://www.warmzilla.co.uk/find-a-boiler">Get your Quote</a>
                    </div>
                    <div class="lic lic-2 hidden-mobile">

                        <span>Review Score</span><div>{{ @$boiler->review }}<em>%</em></div>
                        <!--<img src="{{($boiler->review_img2)?asset('images/finish/'.$boiler->review_img2):asset('images/lic.png')}}">-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="site_wrap tsr11">
        <div class="wrapper2">
            <div class="row">
                <div class="full-width">
                    <div class="svdhe">
                        <h4>Similar boilers you might like</h4>
                        <p>Whether you’re looking to buy a new boiler or just get a boiler quote, the boilers listed below are good value for money</p>
                    </div>
                </div>
                <div class="smlrfw">
                    <div class="itm1">
                        <div class="igsec">
                            <div class="lecr">
                                <img src="{{ asset('images/tb.png') }}">
                                <img src="{{ asset('images/tpp.png') }}">
                            </div>
                            <div class="recr">
                                <div class="gur">
                                    <img src=" {{ asset('images/gur.png') }}">
                                </div>
                                <div class="price">
                                    <span>from</span>
                                    <h2>£1499</h2>
                                    <em>or</em>
                                    <h2 class="scndprice">£10.69</h2>
                                    <u>per month</u>
                                </div>
                            </div>
                        </div>
                        <a href="">+ Compare this boiler</a>
                    </div>
                    <div class="itm1">
                        <div class="igsec">
                            <div class="lecr">
                                <img src="{{ asset('images/tb.png') }}">
                                <img src="{{ asset('images/tpp.png') }}">
                            </div>
                            <div class="recr">
                                <div class="gur">
                                    <img src=" {{ asset('images/gur.png') }}">
                                </div>
                                <div class="price">
                                    <span>from</span>
                                    <h2>£1499</h2>
                                    <em>or</em>
                                    <h2 class="scndprice">£10.69</h2>
                                    <u>per month</u>
                                </div>
                            </div>
                        </div>
                        <a href="">+ Compare this boiler</a>
                    </div>
                    <div class="itm1">
                        <div class="igsec">
                            <div class="lecr">
                                <img src="{{ asset('images/tb.png') }}">
                                <img src="{{ asset('images/tpp.png') }}">
                            </div>
                            <div class="recr">
                                <div class="gur">
                                    <img src=" {{ asset('images/gur.png') }}">
                                </div>
                                <div class="price">
                                    <span>from</span>
                                    <h2>£1499</h2>
                                    <em>or</em>
                                    <h2 class="scndprice">£10.69</h2>
                                    <u>per month</u>
                                </div>
                            </div>
                        </div>
                        <a href="">+ Compare this boiler</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="site_wrap tsr11">
        <div class="wrapper3">
            <div class="row">
                <div class="full-width">
                    <div class="svdhe">
                        <h4>Similar boilers you might like</h4>
                        <p>Whether you’re looking to buy a new boiler or just get a boiler quote, the boilers <br> listed below are good value for money</p>
                    </div>
                </div>
                <div class="smlrfw">
                    <div class="itm1">
                        <div class="igsec">
                            <div class="lecr">
                                <img src="{{asset('images/tb.png')}}" width="120" height="31">
                                <img src="{{asset('images/tpp.png')}}" width="120" height="211">
                            </div>
                            <div class="recr">
                                <div class="gur">
                                    <img src="{{asset('images/5-yrs-icon.svg')}}" width="105" height="81">
                                </div>
                                <div class="price">
                                    <span>from</span>
                                    <h2>£1489</h2>
                                    <em>or</em>
                                    <h2 class="scndprice">£9.80</h2>
                                    <u>per month</u>
                                </div>
                            </div>
                        </div>
                        <span class="exmpltxt"><strong>Example:</strong>Vokera Excel 25kW</span>
                        <!-- <a href="">+ Compare this boiler</a> -->
                    </div>
                    <div class="itm1">
                        <div class="igsec">
                            <div class="lecr">
                                <img src="{{asset('images/ideal-logo.png')}}" width="120" height="31">
                                <img src="{{asset('images/ideal-boiler.png')}}" width="120" height="211">
                            </div>
                            <div class="recr">
                                <div class="gur">
                                    <img src="{{asset('images/7-yrs-icon.svg')}}" width="105" height="81">
                                </div>
                                <div class="price">
                                    <span>from</span>
                                    <h2>£1549</h2>
                                    <em>or</em>
                                    <h2 class="scndprice">£10.59</h2>
                                    <u>per month</u>
                                </div>
                            </div>
                        </div>
                        <span class="exmpltxt"><strong>Example:</strong>Ideal Logic 24kW</span>
                        <!-- <a href="">+ Compare this boiler</a> -->
                    </div>
                    <div class="itm1">
                        <div class="igsec">
                            <div class="lecr">
                                <img src="{{asset('images/worcester-logo.png')}}" width="120" height="31">
                                <img src="{{asset('images/worcester-boiler.png')}}" width="120" height="211">
                            </div>
                            <div class="recr">
                                <div class="gur">
                                    <img src="{{asset('images/10-yrs-icon.svg')}}" width="105" height="81">
                                </div>
                                <div class="price">
                                    <span>from</span>
                                    <h2>£1649</h2>
                                    <em>or</em>
                                    <h2 class="scndprice">£10.86</h2>
                                    <u>per month</u>
                                </div>
                            </div>
                        </div>
                        <span class="exmpltxt"><strong>Example:</strong>Worcester Greenstar 12ri</span>
                        <!-- <a href="">+ Compare this boiler</a> -->
                    </div>
                    <a href="https://www.warmzilla.co.uk/find-a-boiler" class="cboiler-btn">Get Your Quote</a>
                </div>
            </div>
        </div>
    </div>

    <div class="getyourcode">
            <div class="wrapper">
                <div class="getcode-cntnt">
                    <p>Get an instant fixed price quote on your new boiler in 90 seconds</p>
                    <a href="https://www.warmzilla.co.uk/find-a-boiler">Get Your Quote</a>
                </div>
            </div>
        </div><!-- get your quote -->

    <div class="faqs-wrap">
            <div class="wrapper">
                <div class="head-para">
                    <h2><span>FAQ’s</span></h2>
                    <p>Below, we’ve listed some of the most common questions we get asked about WarmZilla</p>
                </div>

                <div id="accordion" class="accordion-container">
                    <article class="content-entry">
                        <h4 class="article-title"><i></i>Is it better to repair or replace my boiler?</h4>
                        <div class="accordion-content">
                            <p>It really depends on the cost of the boiler repair - they can be quite costly and in a lot of cases will only be a matter of time until another boiler repair is needed.
                                <br>
                                <br>
                            Our new boilers come with a minimum 5-year manufacturer's guarantee, so any future boiler repair is free of charge. Modern-day combi boilers are a lot more efficient, which can save you up to £360 per year on your central heating bills.
<br>
<br>
You can read our blog article <a href="https://www.warmzilla.co.uk/blog/repair-or-replace-my-boiler">repair or replace your boiler for more information.</a></p>
                        </div>
                        <!--/.accordion-content-->
                    </article>
                    <article class="content-entry">
                        <h4 class="article-title"><i></i>What is the best boiler to buy?</h4>
                        <div class="accordion-content">
                            <p>We often get asked what is the best boiler to buy. There are a few factors that affect which boiler might best suit your home. 
<br>
<br>
We've created a '<a href="https://www.warmzilla.co.uk/blog/what-are-the-best-boilers-to-buy-in-2021">Best New Boilers</a>' blog that breaks down the best budget and premium boilers in the combi, system, and regular boiler categories.</p>
                        </div>
                        <!--/.accordion-content-->
                    </article>
                    <article class="content-entry">
                        <h4 class="article-title"><i></i>How much does a boiler cost from WarmZilla?</h4>
                        <div class="accordion-content">
                            <p>The <a href="https://www.warmzilla.co.uk/blog/how-much-does-a-new-boiler-cost-complete-guide">price of a replacement boiler</a> really depends on the size of your property and how much hot water is required from your new boiler to efficiently service your home.
<br>
<br>
The average fixed cost with WarmZilla is between £1489 - £4000 depending on what your home requires. Our replacement boiler costs are fixed and are inclusive of VAT.</p>
                        </div>
                        <!--/.accordion-content-->
                    </article>
                </div>
            </div>
        </div><!-- Faqs -->



    <!--center area section --> 
        
    <!-- footer included -->
    <?php //include("includes/footer.php") ?>
    <!-- footer included -->
    
    <!-- external plugins included -->
    <?php //include("includes/plugins.php") ?>
    <!-- external plugins included -->
    
<!--</body>-->

<!--</html>-->

@endsection

<script>
    
function compare(e){
    $.ajax({
        type: 'POST',
        url : "{{route('addtocompare')}}",
        data:{
            _token: '{{ csrf_token() }}',
            boiler_id: e,
        },
        success: function (data) {
            if(data === true){
            //  alert('Added to campare');
                location.reload();
            }
            if(data == 'limitout'){
                alert('Only three Boilers can be added');
            }
            if(data == 'alreadyadded'){
                alert('Already Added');
            }           
        }
    }); 
}  
</script>

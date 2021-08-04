<div class="tsrtopsection">     
    <div class="wrapper">
        <div class="row align-items-center">
            <div class="leftimg col">
               <!--  <img src="{{asset('images/01.png')}}" width="650" height="362" alt="" title=""> -->
                <?php  
                            $mainpage_image = getOption('mainpage_image'); 
                               if($mainpage_image){
                                  $image = $mainpage_image->value;
                                //   echo $questionsHtml;
                               }
                        ?>  
                        <img src="{{ (@$image)?asset('images/boilerfinance/'.$image):asset('images/compareboiler-img.png') }}" width="650" height="362" alt="compareboiler" title="">
            </div>

            <div class="righttext">
            <?php  
                $firstcontainer = getOption('firstcontainer'); 
                if($firstcontainer){
                  $firstcontainerHtml = json_decode($firstcontainer)->value;
                  echo $firstcontainerHtml;
                }
            ?>                
            </div>
        </div>
    </div>
</div><!-- page banner area section -->
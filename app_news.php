<!--the world section start here -->
<section class="hidden-lg hidden-md hidden-sm">
  <div class="">
  <div class="row">

       <div class="col-md-9 col-sm-6">
            <h3 class="cat-sebhead"><span>WORLD</span></h3>
       </div>

     <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
     <div class="panel panel-default panel-body">
     <div class="carousel slide media-carousel" id="thenewsslide6">
        <div class="carousel-inner">
        
        
        <?php
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'WOR%' order by new_id DESC limit 0,1");
$row41 = mysql_fetch_row($que41);
       echo "<div class='item thenew-box  active'>
         
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
			
			<input type='hidden' id='<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button8' onclick="responsiveVoice.speak($('#<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down8' aria-hidden='true'></i>
<i class='fa fa-volume-up up8' aria-hidden='true'></i>
                 </button>	
			
          <?php echo  "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
		   if(isset($_SESSION["value"]))
			 {
				$var1="readmore.php?viewid=".$row41[0]."";
				$var2="";
				$var3=""; 
			 }
			 else
			 {
				$var1="#login-modal";
				$var2="modal";
				$var3="#login-modal";
			 }
		   
           echo" <div class='rewadmore-box'>
			<span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
			  <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
		<div class='main-button'>
		<a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all'>
		<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div class='' data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a class='' target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
             ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
		</div>
        
        </div>";
        
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'WOR%' order by new_id DESC limit 1,20");
while($row41 = mysql_fetch_row($que41))
{
        echo "<div class='item thenew-box'>
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
		
			<input type='hidden' id='w<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button8' onclick="responsiveVoice.speak($('#w<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down8' aria-hidden='true'></i>
<i class='fa fa-volume-up up8' aria-hidden='true'></i>
                 </button>	
			
          <?php echo "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
		   if(isset($_SESSION["value"]))
			 {
				$var1="readmore.php?viewid=".$row41[0]."";
				$var2="";
				$var3=""; 
			 }
			 else
			 {
				$var1="#login-modal";
				$var2="modal";
				$var3="#login-modal";
			 }
		   
           echo" <div class='rewadmore-box'>
			<span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
			  <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
		<div class='main-button'>
		<a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all$row41[0]'>
		<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
              ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
		</div>
        </div>";
}
		?>
        
        </div>
        <a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide6" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
        <a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide6" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
      </div>
      </div>
            
     </div>
    </div>
  </div>
</section>
<!--the world section end here --> 


<!--the Life section start here -->
<section class="hidden-lg hidden-md hidden-sm">
  <div class="">
  <div class="row">

       <div class="col-md-9 col-sm-6">
            <h3 class="cat-sebhead1"><span>LIFE</span></h3>
       </div>

     <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
     <div class="panel panel-default panel-body">
     <div class="carousel slide media-carousel" id="thenewsslide1">
        <div class="carousel-inner">
        
        
        <?php
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'L%' order by new_id DESC limit 0,1");
$row41 = mysql_fetch_row($que41);
       echo "<div class='item thenew-box  active'>
         
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
      
      <input type='hidden' id='<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button3' onclick="responsiveVoice.speak($('#<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down3' aria-hidden='true'></i>
<i class='fa fa-volume-up up3' aria-hidden='true'></i>
                 </button>  
      
          <?php echo  "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div class='' data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a class='' target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
             ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        
        </div>";
        
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'L%' order by new_id DESC limit 1,20");
while($row41 = mysql_fetch_row($que41))
{
        echo "<div class='item thenew-box'>
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
    
      <input type='hidden' id='w<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button3' onclick="responsiveVoice.speak($('#w<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down3' aria-hidden='true'></i>
<i class='fa fa-volume-up up3' aria-hidden='true'></i>
                 </button>  
      
          <?php echo "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all$row41[0]'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
              ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        </div>";
}
    ?>
        
        </div>
        <a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide1" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
        <a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide1" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
      </div>
      </div>
            
     </div>
    </div>
  </div>
</section>
<!--the Life section end here -->



<!--the Sports section start here-->
<section class="hidden-lg hidden-md hidden-sm">
  <div class="">
  <div class="row">

       <div class="col-md-9 col-sm-6">
            <h3 class="cat-sebhead2"><span>SPORTS</span></h3>
       </div>

     <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
     <div class="panel panel-default panel-body">
     <div class="carousel slide media-carousel" id="thenewsslide2">
        <div class="carousel-inner">
        
        
        <?php
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'S%' order by new_id DESC limit 0,1");
$row41 = mysql_fetch_row($que41);
       echo "<div class='item thenew-box  active'>
         
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
      
      <input type='hidden' id='<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button4' onclick="responsiveVoice.speak($('#<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down4' aria-hidden='true'></i>
<i class='fa fa-volume-up up4' aria-hidden='true'></i>
                 </button>  
      
          <?php echo  "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div class='' data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a class='' target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
             ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        
        </div>";
        
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'S%' order by new_id DESC limit 1,20");
while($row41 = mysql_fetch_row($que41))
{
        echo "<div class='item thenew-box'>
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
    
      <input type='hidden' id='w<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button4' onclick="responsiveVoice.speak($('#w<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down4' aria-hidden='true'></i>
<i class='fa fa-volume-up up4' aria-hidden='true'></i>
                 </button>  
      
          <?php echo "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all$row41[0]'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
              ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        </div>";
}
    ?>
        
        </div>
        <a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide2" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
        <a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide2" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
      </div>
      </div>
            
     </div>
    </div>
  </div>
</section>
<!--the Sports section end here-->



<!--the Good News Section start here-->
<section class="hidden-lg hidden-md hidden-sm">
  <div class="">
  <div class="row">

       <div class="col-md-9 col-sm-6">
            <h3 class="cat-sebhead3"><span>GOOD NEWS</span></h3>
       </div>

     <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
     <div class="panel panel-default panel-body">
     <div class="carousel slide media-carousel" id="thenewsslide3">
        <div class="carousel-inner">
        
        
        <?php
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'G%' order by new_id DESC limit 0,1");
$row41 = mysql_fetch_row($que41);
       echo "<div class='item thenew-box  active'>
         
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
      
      <input type='hidden' id='<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button5' onclick="responsiveVoice.speak($('#<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down5' aria-hidden='true'></i>
<i class='fa fa-volume-up up5' aria-hidden='true'></i>
                 </button>  
      
          <?php echo  "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div class='' data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a class='' target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
             ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        
        </div>";
        
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'G%' order by new_id DESC limit 1,20");
while($row41 = mysql_fetch_row($que41))
{
        echo "<div class='item thenew-box'>
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
    
      <input type='hidden' id='w<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button5' onclick="responsiveVoice.speak($('#w<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down5' aria-hidden='true'></i>
<i class='fa fa-volume-up up5' aria-hidden='true'></i>
                 </button>  
      
          <?php echo "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all$row41[0]'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
              ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        </div>";
}
    ?>
        
        </div>
        <a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide3" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
        <a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide3" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
      </div>
      </div>
            
     </div>
    </div>
  </div>
</section>

<!--the Good news section end here-->



<!--the Entertainment section start here-->
<section class="hidden-lg hidden-md hidden-sm">
  <div class="">
  <div class="row">

       <div class="col-md-9 col-sm-6">
            <h3 class="cat-sebhead4"><span>ENTERTAINMENT</span></h3>
       </div>

     <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
     <div class="panel panel-default panel-body">
     <div class="carousel slide media-carousel" id="thenewsslide4">
        <div class="carousel-inner">
        
        
        <?php
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'E%' order by new_id DESC limit 0,1");
$row41 = mysql_fetch_row($que41);
       echo "<div class='item thenew-box  active'>
         
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
      
      <input type='hidden' id='<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button6' onclick="responsiveVoice.speak($('#<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down6' aria-hidden='true'></i>
<i class='fa fa-volume-up up6' aria-hidden='true'></i>
                 </button>  
      
          <?php echo  "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div class='' data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a class='' target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
             ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        
        </div>";
        
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'E%' order by new_id DESC limit 1,20");
while($row41 = mysql_fetch_row($que41))
{
        echo "<div class='item thenew-box'>
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
    
      <input type='hidden' id='w<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button6' onclick="responsiveVoice.speak($('#w<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down6' aria-hidden='true'></i>
<i class='fa fa-volume-up up6' aria-hidden='true'></i>
                 </button>  
      
          <?php echo "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all$row41[0]'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
              ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        </div>";
}
    ?>
        
        </div>
        <a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide4" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
        <a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide4" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
      </div>
      </div>
            
     </div>
    </div>
  </div>
</section>

<!--the Entertainment section end here-->



<!--the trending section start here -->

<section class="hidden-lg hidden-md hidden-sm">
  <div class="">
  <div class="row">

       <div class="col-md-9 col-sm-6">
            <h3 class="cat-sebhead5"><span>TRENDING</span></h3>
       </div>

     <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
     <div class="panel panel-default panel-body">
     <div class="carousel slide media-carousel" id="thenewsslide5">
        <div class="carousel-inner">
        
        
        <?php
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'T%' order by new_id DESC limit 0,1");
$row41 = mysql_fetch_row($que41);
       echo "<div class='item thenew-box  active'>
         
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
      
      <input type='hidden' id='<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button7' onclick="responsiveVoice.speak($('#<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down7' aria-hidden='true'></i>
<i class='fa fa-volume-up up7' aria-hidden='true'></i>
                 </button>  
      
          <?php echo  "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div class='' data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a class='' target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
             ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        
        </div>";
        
$que41 = mysql_query("SELECT * from news_update WHERE categoury LIKE 'T%' order by new_id DESC limit 1,20");
while($row41 = mysql_fetch_row($que41))
{
        echo "<div class='item thenew-box'>
           <img src='$row41[5]' class='img-responsive' alt='$row41[1]'>
            <h3>$row41[1]</h3>
            <small>$row41[12] $row41[13] $row41[14] $row41[9]</small>
            <div class='know-news'>Know</div>
            <div class='the-news'><span>The News</span>
              <div class='news-right'></div>
            </div>";?>
    
      <input type='hidden' id='w<?php echo$row41[0]; ?>' value='<?php echo strip_tags($row41[2]); ?>'>

<button class='volume-button7' onclick="responsiveVoice.speak($('#w<?php echo$row41[0];?>').val(),'UK English Female', {rate: 0.9});">
                 <i class='fa fa-volume-off down7' aria-hidden='true'></i>
<i class='fa fa-volume-up up7' aria-hidden='true'></i>
                 </button>  
      
          <?php echo "<br><p class='thnews-txt'>$row41[2]</p>
           <hr>";
       if(isset($_SESSION["value"]))
       {
        $var1="readmore.php?viewid=".$row41[0]."";
        $var2="";
        $var3=""; 
       }
       else
       {
        $var1="#login-modal";
        $var2="modal";
        $var3="#login-modal";
       }
       
           echo" <div class='rewadmore-box'>
      <span class='click-for'>Click for</span>
              <h3><span><a href='$var1' data-toggle='$var2' data-target='$var3'> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
        <div class='triangle-right'> </div>
            </div>
        <div class='thenew-share-box'>
    <div class='main-button'>
    <a class='share-menu btn' data-toggle='collapse' href='#share-icon-all$row41[0]' aria-expanded='false' aria-controls='share-icon-all$row41[0]'>
    <i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
            <ul class='share-icon' id='share-icon-all$row41[0]'>
                  <li><div data-href='http://newzworm.com/readmore.php?viewid=$row41[0]' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnewzworm.com%2Freadmore.php%3Fviewid%3D$row1[0]&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
          <li><a target='_blank' href='https://twitter.com/intent/tweet?text=$row41[1]&nbsp;http://newzworm.com/readmore.php?viewid=$row41[0]'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
              ";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li> 
    echo" 
               <li><span class='g-plusone' data-annotation='none'></span></li>
            </ul>
    </div>
        </div>";
}
    ?>
        
        </div>
        <a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide5" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
        <a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide5" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
      </div>
      </div>
            
     </div>
    </div>
  </div>
</section>

<!-- the Trending section end here -->

<!--skillizen banner Start here -->

  <div class="col-xs-12 hidden-sm hidden-md hidden-lg"> 
    <a href="http://skillizen.com/" target="_blank" class="new-add"><img src="add/skillizen.jpg" class="img-add" alt="" title=""/></a>
   
       </div>
<!-- Skillizen banner End here -->
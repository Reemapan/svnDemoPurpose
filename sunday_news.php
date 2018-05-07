<!--Banner here -->
<img src='add/sunday.gif' class='img-responsive'  style='z-index:1100;position:fixed;top:0px; height:115px;left:29%;width:665px'/>
<section>
<div class="container">
<div class="row">
<div class="col-lg-3 col-sm-3 col-xs-12 hidden-xs">
<!--start white-box -->
<?php

$que1 = $conn->query("SELECT * from news_update where sunday_news=1  order by new_id DESC limit 10,1");
$row1 = $que1->fetch_assoc();
$rto = substr($row1['categoury'],0,3);
if($rto=="WOR")
{$gh2="world-tag";}
if($rto=="LIF")
{$gh2="life-tag";}
if($rto=="SPO")
{$gh2="sport-tag";}
if($rto=="GOO")
{$gh2="good-tag";}
if($rto=="ENT")
{$gh2="enter-tag";}
if($rto=="TRE")
{$gh2="trand-tag";}

$varo=$row1['new_title'];
$catg=str_replace(" ","-",$row1['categoury']);
$varo=str_replace(" ","-",$row1['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row1['new_id']."'>
<div class='allcat-box'><span class='$gh2'>".$row1['categoury']."</span> <img src='m/".$row1['image_url']."' class='img-responsive' alt='".$row1['new_title']."' title='".$row1['new_title']."'/>
<p class='ext-p'>".$row1['new_title']."</p>
</div>
</a>"; ?>
<?php
$que1 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 11,1");
$row1 = $que1->fetch_assoc();

$rto1 = substr($row1['categoury'],0,3);
if($rto1=="WOR")
{$gh1="world-tag";}
if($rto1=="LIF")
{$gh1="life-tag";}
if($rto1=="SPO")
{$gh1="sport-tag";}
if($rto1=="GOO")
{$gh1="good-tag";}
if($rto1=="ENT")
{$gh1="enter-tag";}
if($rto1=="TRE")
{$gh1="trand-tag";}
$catg=str_replace(" ","-",$row1['categoury']);
$varo=str_replace(" ","-",$row1['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row1['new_id']."'>
<div class='allcat-box'><span class='$gh1'>".$row1['categoury']."</span> <img src='m/".$row1['image_url']."' class='img-responsive' alt='".$row1['new_title']."' title='".$row1['new_title']."'/>
<p class='ext-p'>".$row1['new_title']." </p>
</div>
</a>"; ?>
<!--end white-box -->
</div>
<div class="col-lg-7 col-sm-7 col-xs-12">
<!-- main slider start here -->
<div id="carousel-example-generic" class="carousel slide top-slide" data-ride="carousel">
<div class="carousel-inner mainslider-box text-center">
<?php
$mi1 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 0,1");
$wri1 = $mi1->fetch_assoc();
{
$rto4 = substr($wri1['categoury'],0,3);
if($rto4=="WOR")
{$gh6="world-tag";}
if($rto4=="LIF")
{$gh6="life-tag";}
if($rto4=="SPO")
{$gh6="sport-tag";}
if($rto4=="GOO")
{$gh6="good-tag";}
if($rto4=="ENT")
{$gh6="enter-tag";}
if($rto4=="TRE")
{$gh6="trand-tag";}
echo "<div class='item active'>";
$catg=trim($wri1['categoury']);
$catg=str_replace(" ","-",$catg);
$varo=str_replace(" ","-",$wri1['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$wri1['new_id']."'>
<span class='$gh6'>".$wri1['categoury']." </span>
<img src='m/".$wri1['image_url']."' alt='".$wri1['new_title']."'></a>
<div class='carousel-caption'>
<a href='$catg/".$varo."/".$wri1['new_id']."'><h3>".$wri1['new_title']."</h3>
<p>".$wri1['slider_dis']."</p></a>
</div>
</div>";
}
?>
<?php
$mi2 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 1,9");
while($wri2 = $mi2->fetch_assoc())
{
$rto5 = substr($wri2['categoury'],0,3);
if($rto5=="WOR")
{$gh7="world-tag";}
if($rto5=="LIF")
{$gh7="life-tag";}
if($rto5=="SPO")
{$gh7="sport-tag";}
if($rto5=="GOO")
{$gh7="good-tag";}
if($rto5=="ENT")
{$gh7="enter-tag";}
if($rto5=="TRE")
{$gh7="trand-tag";}
echo "<div class='item'>";
$catg=trim($wri2['categoury']);
$catg=str_replace(" ","-",$catg);
$varo=str_replace(" ","-",$wri2['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$wri2['new_id']."'>
<span class='$gh7'>".$wri2['categoury']." </span>
<img src='m/".$wri2['image_url']."' alt='".$wri2['new_title']."'></a>
<div class='carousel-caption'>
<a href='$catg/".$varo."/".$wri2['new_id']."'> <h3>
".$wri2['new_title']."</h3>
<p>".$wri2['slider_dis']."</p></a>
</div>
</div>";
}
?>
</div>
<a class="main-slider-left" href="#carousel-example-generic" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="main-slider-right" href="#carousel-example-generic" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"> </span></a>
</div>
<div class="carousel slide media-carousel hidden-xs" id="media">
<div class="carousel-inner">
<ul class="item active mainthumb">
<?php
$que42 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 0,3");
while($row42 = $que42->fetch_assoc())
{
$rto6 = substr($row42['categoury'],0,3);
if($rto6=="WOR")
{$gh8="world-tag";}
if($rto6=="LIF")
{$gh8="life-tag";}
if($rto6=="SPO")
{$gh8="sport-tag";}
if($rto6=="GOO")
{$gh8="good-tag";}
if($rto6=="ENT")
{$gh8="enter-tag";}
if($rto6=="TRE")
{$gh8="trand-tag";}
echo "<li>";

$catg=str_replace(" ","-",$row42['categoury']);
$varo=str_replace(" ","-",$row42['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row42['new_id']."'>
<span class='$gh8'>".$row42['categoury']." </span>
<img src='m/".$row42['image_url']."' class='img-responsive' alt='' />
<span>".$row42['new_title']."</span>
</a>
</li>";
}
?>
</ul>

<ul class="item mainthumb">
<?php
$que43 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 3,3");
while($row43 = $que43->fetch_assoc())
{
$rto7 = substr($row43['categoury'],0,3);
if($rto7=="WOR")
{$gh9="world-tag";}
if($rto7=="LIF")
{$gh9="life-tag";}
if($rto7=="SPO")
{$gh9="sport-tag";}
if($rto7=="GOO")
{$gh9="good-tag";}
if($rto7=="ENT")
{$gh9="enter-tag";}
if($rto7=="TRE")
{$gh9="trand-tag";}
echo "<li>";
$varo=str_replace(" ","-",$row43['new_title']);
$catg=str_replace(" ","-",$row43['categoury']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row43['new_id']."'>
<span class='$gh9'>'".$row43['categoury']."</span>
<img src='m/".$row43['image_url']."' class='img-responsive'  alt='' />
<span>".$row43['new_title']."</span>
</a>
</li>";
}
?>
</ul>

<ul class="item mainthumb">
<?php
$que43 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 6,3");
while($row43 = $que43->fetch_assoc())
{
$rto8 = substr($row43['categoury'],0,3);
if($rto8=="WOR")
{$gh91="world-tag";}
if($rto8=="LIF")
{$gh91="life-tag";}
if($rto8=="SPO")
{$gh91="sport-tag";}
if($rto8=="GOO")
{$gh91="good-tag";}
if($rto8=="ENT")
{$gh91="enter-tag";}
if($rto8=="TRE")
{$gh91="trand-tag";}
echo "<li>";
$varo=str_replace(" ","-",$row43['new_title']);
$catg=str_replace(" ","-",$row43['categoury']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row43['new_id']."'>
<span class='$gh91'>".$row43['categoury']."</span>
<img src='m/".$row43['image_url']."' class='img-responsive'  alt='' />
<span>".$row43['new_title']."</span>
</a>
</li>";
}
?>
</ul>

</div>
<a data-slide="prev" href="#media" class="main-thumb-left"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a data-slide="next" href="#media" class="main-thumb-right"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- main slider end here -->
</div>
<div class="col-lg-2 col-sm-2 col-xs-12">
<a href="https://skillizen.com/" target="_blank" class="new-add"><img src="add/skillizen.jpg" class="img-add" alt="skillizen" title="skillizen"/></a>

</div>
</div>
</div>
</section>
<!--banner end here -->
<!--Bid add start here -->
<!--<div class="container">
<div class="big-add text-center"> <a href="https://www.amazon.in/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=sidharth+tripathy" target="_blank"><img src="add/obig-add.gif"  class="img-responsive big-add-img" alt="" title="" /></a> </div>
</div>-->
<!--Bid add end here -->
<!--the news section start here -->
<section>
<div class="container">
<div class="row">
<div class="col-lg-7 col-xs-12 col-sm-6">
<div class="panel panel-default panel-body">
<div class="carousel slide media-carousel" id="thenewsslide">
<div class="carousel-inner">
<?php
$que41 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 12,1");
$row41 = $que41->fetch_assoc();
$rto2 = substr($row41['categoury'],0,3);
if($rto2=="WOR")
{$gh5="world-tag";}
if($rto2=="LIF")
{$gh5="life-tag";}
if($rto2=="SPO")
{$gh5="sport-tag";}
if($rto2=="GOO")
{$gh5="good-tag";}
if($rto2=="ENT")
{$gh5="enter-tag";}
if($rto2=="TRE")
{$gh5="trand-tag";}
echo "<div class='item thenew-box  active'>
<span class='$gh5'>".$row41['categoury']."</span>
<img src='m/".$row41['image_url']."' class='img-responsive' alt='".$row41['new_title']."'>
<h3>".$row41['new_title']."</h3>
<small>".$row41['udate']." ". $row41['umonth']." ". $row41['uyear']." ". $row41['news_day']."</small>
<div class='know-news'>Know
<div class='know-news-red'><span>The News</span> </div>
</div>";?>

<input type='hidden' id='<?php echo $row41['new_id']; ?>' value='<?php echo strip_tags($row41['news_content1']); ?>'>

<button class='volume-button' onclick="responsiveVoice.speak($('#<?php echo $row41['new_id'];?>').val(),'UK English Female', {rate: 0.9});">
<i class='fa fa-volume-off down2' aria-hidden='true'></i>
<i class='fa fa-volume-up up2' aria-hidden='true'></i>
</button>

<?php

echo  "<br><p class='thnews-txt'>";
$country=trim($row41['country']);
if(!empty($country)){
$quert = $conn->query("Select * from country where name='$country'");
$row10 = $quert->fetch_assoc();
$flag=$row10['flag'];
$alpha2=trim($row10['alpha2']);
$address=trim($row41['city']);
$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2=$q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
$news= preg_replace("/".$address."/","<b class='gm' title='$alpha2' value='$address'><img src='https://www.newzworm.com/m/flags/$flag' width=20px height=20px> $0 <i class='fa fa-map-marker'></i>  </b>",$row41['news_content1']);	

echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $news);
}
else{
	$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2=$q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
	echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $row41['news_content1']);
}

$varo=str_replace(" ","-",strip_tags($row41['new_title']));
$catg=str_replace(" ","-",$row41['categoury']);
$varo=str_replace("?","",$varo);
echo"<a href='".$catg."/$varo/".$row41['new_id']."' data-toggle='' data-target='' style='color:#00f;'> READ MORE</a>
</p>
<hr>";

echo" <div class='rewadmore-box'>
<span class='click-for'>Click for</span>
<h3><span><a href='".$catg."/$varo/".$row41['new_id']."' data-toggle='' data-target=''> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
<div class='triangle-right'> </div>
</div>
<div class='thenew-share-box'>
<div class='main-button'>
<a class='share-menu btn' data-toggle='collapse' href='#share-icon-all' aria-expanded='false' aria-controls='share-icon-all'>
<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
<ul class='share-icon' id='share-icon-all'>
<li><div data-href='https://newzworm.com/$catg/$varo/".$row41['new_id']."' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fnewzworm.com/$catg/$varo/".$row41['new_id']."&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
<li><a target='_blank' href='https://twitter.com/intent/tweet?text=".$varo." https://newzworm.com/$catg/$varo/".$row41['new_id']."'  data-size='large'><i class='fa fa-twitter twiter'></i></a></li>
";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li>
echo"
<li><a href='https://plus.google.com/share?url=https://newzworm.com/$catg/$varo/".$row41['new_id']."' target='_blank' onclick='javascript:window.open(this.href);return false;'><img src='https://www.gstatic.com/images/icons/gplus-32.png' alt='Share on Google+'/></a></li>
</ul>
</div>

</div>";

$que41 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 13,60");
while($row41 = $que41->fetch_assoc())
{
$rto2 = substr($row41['categoury'],0,3);
if($rto2=="WOR")
{$gh5="world-tag";}
if($rto2=="LIF")
{$gh5="life-tag";}
if($rto2=="SPO")
{$gh5="sport-tag";}
if($rto2=="GOO")
{$gh5="good-tag";}
if($rto2=="ENT")
{$gh5="enter-tag";}
if($rto2=="TRE")
{$gh5="trand-tag";}


echo "<div class='item thenew-box'>
<span class='$gh5'>".$row41['categoury']."</span>
<img src='m/".$row41['image_url']."' class='img-responsive' alt='".$row41['new_title']."'>
<h3>".$row41['new_title']."</h3>
<small>".$row41['udate']." ". $row41['umonth']." ". $row41['uyear']." ". $row41['news_day']."</small>
<div class='know-news'>Know
<div class='know-news-red'><span>The News</span> </div>
</div>";?>

<input type='hidden' id='t<?php echo$row41['new_id']; ?>' value='<?php echo strip_tags($row41['news_content1']); ?>'>

<button class='volume-button' onclick="responsiveVoice.speak($('#t<?php echo$row41['new_id'];?>').val(),'UK English Female', {rate: 0.9});">
<i class='fa fa-volume-off down2' aria-hidden='true'></i>
<i class='fa fa-volume-up up2' aria-hidden='true'></i>
</button>

<?php
echo "<br><p class='thnews-txt'>";
$country=trim($row41['country']);
if(!empty($country)){

$quert = $conn->query("Select * from country where name='$country'");
$row10 = $quert->fetch_assoc();
$flag=$row10['flag'];
$alpha2=trim($row10['alpha2']);
$address=trim($row41['city']);
$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2= $q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
$news= preg_replace("/".$address."/","<b class='gm' title='$alpha2' value='$address'><img src='https://www.newzworm.com/m/flags/$flag' width=20px height=20px> $0 <i class='fa fa-map-marker'></i>  </b>",$row41['news_content1']);	

echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $news);
}
else{
	$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2=$q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
	echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $row41['news_content1']);
}

$catg=str_replace(" ","-",$row41['categoury']);
$varo=str_replace(" ","-",strip_tags($row41['new_title']));
$varo=str_replace("?","",$varo);
echo"<a href='".$catg."/$varo/".$row41['new_id']."' data-toggle='' data-target='' style='color:#00f;'> READ MORE</a>
<hr>";
echo" <div class='rewadmore-box'>
<span class='click-for'>Click for</span>
<h3><span><a href='".$catg."/$varo/".$row41['new_id']."' data-toggle='' data-target=''> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
<div class='triangle-right'> </div>
</div>
<div class='thenew-share-box'>
<div class='main-button'>
<a class='share-menu btn' data-toggle='collapse' href='#share-icon-all".$row41['new_id']."' aria-expanded='false' aria-controls='share-icon-all".$row41['new_id']."'>
<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
<ul class='share-icon' id='share-icon-all".$row41['new_id']."'>
<li><div data-href='https://newzworm.com/$catg/$varo/".$row41['new_id']."' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fnewzworm.com/$catg/$varo/".$row41['new_id']."&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
<li><a target='_blank' href='https://twitter.com/intent/tweet?text=".$varo." https://newzworm.com/$catg/$varo/".$row41['new_id']."'  data-size='large'><i class='fa fa-twitter twiter'></i></a></li>
";//<li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li>
echo"
<li><a href='https://plus.google.com/share?url=https://newzworm.com/$catg/$varo/".$row41['new_id']."' target='_blank' onclick='javascript:window.open(this.href);return false;'><img src='https://www.gstatic.com/images/icons/gplus-32.png' alt='Share on Google+'/></a></li>
</ul>
</div>
</div>";
}
?>

</div>
<a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
<a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#thenewsslide" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
</div>
</div>

</div>
<div class="col-lg-3 col-xs-12 col-sm-3 hidden-xs">
<div class="panel">
<div class="panel-body pad0">
<ul class="vertical-slide">
<?php
$que44 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 12,30");
while($row44 = $que44->fetch_assoc())
{
echo "<li class='news-item'>";
$catg=str_replace(" ","-",$row44['categoury']);
$varo=str_replace(" ","-",$row44['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row44['new_id']."'>
<span class='trand-tag'>TRENDING </span>
<img src='m/".$row44['image_url']."' class='img-responsive'  alt='".$row44['new_title']."' />
<p>'".$row44['new_title']."</p></a>

</li>";
}
?>

</ul>
</div>
<div class="panel-footer padd0 text-center"> </div>
</div>
</div>

<div class="col-lg-2 col-sm-2 col-xs-12 hidden-xs">
<!--start white-box -->
<a href="https://www.amazon.in/Launch-your-company-before-turn-ebook/dp/B0194ZA5SI?ie=UTF8&keywords=sidharth%20tripathy&qid=1475841392&ref_=sr_1_6&sr=8-6" class="new-add" target="_blank">
<img src="add/books.jpg" class="book" alt="" title=""/></a>


<a href="https://www.amazon.in/Launch-your-company-before-turn-ebook/dp/B0194ZA5SI?ie=UTF8&keywords=sidharth%20tripathy&qid=1475841392&ref_=sr_1_6&sr=8-6" class="new-add" target="_blank">
<img src="add/economic.jpg" class="book" alt="" title=""/></a>

<!--end white-box -->
<!-- start white box -->
<a href="http://www.iskillsolympiad.org/" target="_blank" class="new-add">
<img src="add/olympiad.jpg" class="book" alt="" title=""/> </a>



<!--end white-box -->

</div>
</div>
</div>
</section>
<!--the news section end here -->

<!--World News section start here -->
<section class="lastest-section hidden-xs">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-6">
<h3 class="cat-sebhead"><span>World</span></h3>
</div>
<div class="col-md-3 col-sm-6">
<!-- Controls -->
<div class="controls text-right">
<a class="left fa fa-chevron-left btn btn-success" href="#worldslide"  data-slide="prev"></a>
<a class="right fa fa-chevron-right btn btn-success" href="#worldslide"  data-slide="next"></a>
</div>
</div>
</div>
<div id="worldslide" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<ul class="item active catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE  sunday_news=1 and categoury LIKE 'W%' order by new_id DESC limit 0,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php
for($o=4;$o<30;$o=$o+4)
{
?>
<ul class="item catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'W%' order by new_id DESC limit $o,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row1['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>
</ul>
<?php }?>
</div>
</div>
</div>
</section>
<!--World News section end here -->
<!--life News section start here -->
<section class="lastest-section hidden-xs">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-6">
<h3 class="cat-sebhead1"><span>life</span></h3>
</div>
<div class="col-md-3 col-sm-6">
<!-- Controls -->
<div class="controls text-right">
<a class="left fa fa-chevron-left btn btn-success" href="#lifeslide"  data-slide="prev"></a>
<a class="right fa fa-chevron-right btn btn-success" href="#lifeslide"  data-slide="next"></a>
</div>
</div>
</div>
<div id="lifeslide" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<ul class="item active catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'L%' order by new_id DESC limit 0,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php
for($o=4;$o<30;$o=$o+4)
{
?>
<ul class="item catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'L%' order by new_id DESC limit $o,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>
</ul>
<?php }?>

</div>
</div>
</div>

</section>
<!--life News section end here -->

<!--sport News section start here -->
<section class="lastest-section hidden-xs">

<div class="container">
<div class="row">
<div class="col-md-9 col-sm-6">
<h3 class="cat-sebhead2"><span>Sports</span></h3>
</div>
<div class="col-md-3 col-sm-6">
<!-- Controls -->
<div class="controls text-right">
<a class="left fa fa-chevron-left btn btn-success" href="#sportslide"  data-slide="prev"></a>
<a class="right fa fa-chevron-right btn btn-success" href="#sportslide"  data-slide="next"></a>
</div>
</div>
</div>
<div id="sportslide" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<ul class="item active catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'S%' order by new_id DESC limit 0,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php
for($o=4;$o<30;$o=$o+4)
{
?>
<ul class="item catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'S%' order by new_id DESC limit $o,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php }?>

</div>
</div>
</div>

</section>
<!--sport News section end here -->

<!--good News section start here -->
<section class="lastest-section hidden-xs">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-6">
<h3 class="cat-sebhead3"><span>Good News</span></h3>
</div>
<div class="col-md-3 col-sm-6">
<!-- Controls -->
<div class="controls text-right">
<a class="left fa fa-chevron-left btn btn-success" href="#goodslide"  data-slide="prev"></a>
<a class="right fa fa-chevron-right btn btn-success" href="#goodslide"  data-slide="next"></a>
</div>
</div>
</div>
<div id="goodslide" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<ul class="item active catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'G%' order by new_id DESC limit 0,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$catg=str_replace(" ","-",$row51['categoury']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php
for($o=4;$o<30;$o=$o+4)
{
?>
<ul class="item catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'G%' order by new_id DESC limit $o,4");
while($row51 =$que51->fetch_assoc())
{
echo "<li>";
$catg=str_replace(" ","-",$row51['categoury']);
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$catg."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>
</ul>
<?php }?>

</div>
</div>
</div>
</section>
<!--good News section end here -->

<!-- Entertainment News section start here -->
<section class="lastest-section hidden-xs">

<div class="container">
<div class="row">
<div class="col-md-9 col-sm-6">
<h3 class="cat-sebhead4"><span> Entertainment</span></h3>
</div>
<div class="col-md-3 col-sm-6">
<!-- Controls -->
<div class="controls text-right">
<a class="left fa fa-chevron-left btn btn-success" href="#enterslide"  data-slide="prev"></a>
<a class="right fa fa-chevron-right btn btn-success" href="#enterslide"  data-slide="next"></a>
</div>
</div>
</div>
<div id="enterslide" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<ul class="item active catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'E%' order by new_id DESC limit 0,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php
for($o=4;$o<30;$o=$o+4)
{
?>
<ul class="item catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'E%' order by new_id DESC limit $o,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php }?>

</div>
</div>
</div>
</section>
<!-- Entertainment News section end here -->

<!--  Trending News section start here -->
<section class="lastest-section hidden-xs">

<div class="container">
<div class="row">
<div class="col-md-9 col-sm-6">
<h3 class="cat-sebhead5"><span>Trending</span></h3>
</div>
<div class="col-md-3 col-sm-6">
<!-- Controls -->
<div class="controls text-right">
<a class="left fa fa-chevron-left btn btn-success" href="#trandslide"  data-slide="prev"></a>
<a class="right fa fa-chevron-right btn btn-success" href="#trandslide"  data-slide="next"></a>
</div>
</div>
</div>
<div id="trandslide" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<ul class="item active catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'T%' order by new_id DESC limit 0,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php
for($o=4;$o<30;$o=$o+4)
{
?>
<ul class="item catagery-slide">
<?php
$que51 = $conn->query("SELECT * from news_update WHERE sunday_news=1 and categoury LIKE 'T%' order by new_id DESC limit $o,4");
while($row51 = $que51->fetch_assoc())
{
echo "<li>";
$varo=str_replace(" ","-",$row51['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='".$row51['categoury']."/".$varo."/".$row51['new_id']."'>
<img src='m/".$row51['image_url']."' class='img-responsive' alt='".$row51['new_title']."' title='".$row51['new_title']."' />
<p>".$row51['new_title']." </p>
</a>
</li>";
}
?>

</ul>
<?php }?>

</div>
</div>
</div>
</section>
<!--  Trending News section end here -->


<!--Newzworm Social Zone section start here -->
<section class="lastest-section">
<div class="container">
<div class="col-lg-12">
<h3 class="sub-heading"><span>Newzworm Social Zone</span></h3>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">   <!--start white-box -->
<div class="white-box">
<iframe class="facebook-box" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnewzworm%2F&tabs=timeline&width=550&height=350&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"></iframe>

</div>
<!--end white-box -->
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
<!--start white-box -->
<div class="white-box">
<a class="twitter-timeline" href="https://twitter.com/newzworm" data-width="522" data-height="350">Tweets by @newzworm
</a>
<!--<a class="twitter-timeline" href="https://twitter.com/newzworm" data-width="522" data-height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">Tweets by newzworm</a>
--></div>
<!--end white-box -->
</div>
</div>
</section>
<!--Newzworm Social Zone section end here -->

<!--social post section start here -->
<section class="lastest-section">
<div class="container">
<div class="col-lg-12">
<h3 class="sub-heading"><span>Most Read News of The Month</span></h3>
<?php
$que7 = $conn->query("SELECT news_id FROM comment_section GROUP BY news_id ORDER BY COUNT(*) DESC LIMIT 1");
$row7 = $que7->fetch_assoc();
/*echo "$row7['new_id']";*/
?>

</div>

</div>
<div class="container">
<div class="row">
<div class="col-lg-6 col-sm-6 col-xs-12">
<!--start white-box -->
<div class="panel panel-default panel-body">
<div class="carousel slide media-carousel" id="monthslide">
<div class="carousel-inner">
<?php
$que41 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 61,1");
$row41 = $que41->fetch_assoc();
$rto2 = substr($row41['categoury'],0,3);
if($rto2=="WOR")
{$gh5="world-tag";}
if($rto2=="LIF")
{$gh5="life-tag";}
if($rto2=="SPO")
{$gh5="sport-tag";}
if($rto2=="GOO")
{$gh5="good-tag";}
if($rto2=="ENT")
{$gh5="enter-tag";}
if($rto2=="TRE")
{$gh5="trand-tag";}
echo "<div class='item thenew-box  active'>
<span class='$gh5'>".$row41['categoury']."</span>
<img src='m/".$row41['image_url']."' class='img-responsive' alt='".$row41['new_title']."'>
<h3>".$row41['new_title']."</h3>
<small>".$row41['udate']." ".$row41['umonth']." ". $row41['uyear']."".$row41['news_day']."</small>
<div class='know-news'>Know
<div class='know-news-red'><span>The News</span> </div>
</div>
"?>

<input type='hidden' id='text3' value='<?php echo strip_tags($row41['news_content1']); ?>'>

<button class='volume-buttonn' onclick="responsiveVoice.speak($('#text3').val(),'UK English Female', {rate: 0.9});">
<i class='fa fa-volume-off down1' aria-hidden='true'></i>
<i class='fa fa-volume-up up1' aria-hidden='true'></i>
</button>

<?php
echo "<br><p class='thnews-txt'>";
echo "<br><p class='thnews-txt'>";
$country=trim($row41['country']);
if(!empty($country)){
$quert = $conn->query("Select * from country where name='$country'");
$row10 = $quert->fetch_assoc();
$flag=$row10['flag'];
$alpha2=trim($row10['alpha2']);
$address=trim($row41['city']);
$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2=$q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
$news= preg_replace("/".$address."/","<b class='gm' title='$alpha2' value='$address'><img src='https://www.newzworm.com/m/flags/$flag' width=20px height=20px> $0 <i class='fa fa-map-marker'></i>  </b>",$row41['news_content1']);	

echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $news);
}
else{
	$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2=$q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
	echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $row41['news_content1']);
}

$catg=str_replace(" ","-",$row41['categoury']);
$varo=str_replace(" ","-",strip_tags($row41['new_title']));
$varo=str_replace("?","",$varo);
echo"<a href='".$catg."/$varo/".$row41['new_id']."' data-toggle='' data-target='' style='color:#00f;'> READ MORE</a></p>
<hr>";
echo" <div class='rewadmore-box'>
<span class='click-for'>Click for</span>
<h3><span><a href='".$row41['categoury']."/$varo/".$row41['new_id']."' data-toggle='' data-target=''> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
<div class='triangle-right'> </div>
</div>
<div class='thenew-share-box'>
<div class='main-button'>
<a class='share-menu btn' data-toggle='collapse' href='#share-icon-all2' aria-expanded='false' aria-controls='share-icon-all2'>
<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
<ul class='share-icon' id='share-icon-all2'>
<li><div data-href='https://newzworm.com/$catg/$varo/".$row41['new_id']."' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fnewzworm.com/$catg/$varo/".$row41['new_id']."&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
<li><a target='_blank' href='https://twitter.com/intent/tweet?text=".$varo." https://newzworm.com/$catg/$varo/".$row41['new_id']."'  data-size='large'><i class='fa fa-twitter twiter'></i></a></li>
";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li>
echo"
<li><a href='https://plus.google.com/share?url=https://newzworm.com/$catg/$varo/".$row41['new_id']."' target='_blank' onclick='javascript:window.open(this.href);return false;'><img src='https://www.gstatic.com/images/icons/gplus-32.png' alt='Share on Google+'/></a></li>
</ul>
</div>

</div>";

$que41 = $conn->query("SELECT * from news_update where sunday_news=1 order by new_id DESC limit 62,150");
while($row41 = $que41->fetch_array())
{
$rto2 = substr($row41['categoury'],0,3);
if($rto2=="WOR")
{$gh5="world-tag";}
if($rto2=="LIF")
{$gh5="life-tag";}
if($rto2=="SPO")
{$gh5="sport-tag";}
if($rto2=="GOO")
{$gh5="good-tag";}
if($rto2=="ENT")
{$gh5="enter-tag";}
if($rto2=="TRE")
{$gh5="trand-tag";}


echo "<div class='item thenew-box'>
<span class='$gh5'>".$row41['categoury']."</span>
<img src='m/".$row41['image_url']."' class='img-responsive' alt='".$row41['new_title']."'>
<h3>".$row41['new_title']."</h3>
<small>".$row41['udate']." ".$row41['umonth']." ".$row41['uyear']." ".$row41['news_day']."</small>
<div class='know-news'>Know
<div class='know-news-red'><span>The News</span> </div>
</div>
"?>

<input type='hidden' id='<?php echo$row41['new_id'];?>' value='<?php echo strip_tags($row41['news_content1']); ?>'>

<button class='volume-buttonn' onclick="responsiveVoice.speak($('#<?php echo$row41['new_id'];?>').val(),'UK English Female', {rate: 0.9});">
<i class='fa fa-volume-off down1' aria-hidden='true'></i>
<i class='fa fa-volume-up up1' aria-hidden='true'></i>
</button>

<?php
echo "<br><p class='thnews-txt'>";
$country=trim($row41['country']);
if(!empty($country)){

$quert = $conn->query("Select * from country where name='$country'");
$row10 = $quert->fetch_assoc();
$flag=$row10['flag'];
$alpha2=trim($row10['alpha2']);
$address=trim($row41['city']);

$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2=$q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
$news= preg_replace("/".$address."/","<b class='gm' title='$alpha2' value='$address'><img src='https://www.newzworm.com/m/flags/$flag' width=20px height=20px> $0 <i class='fa fa-map-marker'></i>  </b>",$row41['news_content1']);	

echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $news);
}
else{
	$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2=$q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}
	echo preg_replace("/\b(". implode('|', $words) . ")\b/", "<b class='wordmeaning' title='$1'>$1</b>", $row41['news_content1']);
}

$catg=str_replace(" ","-",$row41['categoury']);
$varo=str_replace(" ","-",strip_tags($row41['new_title']));
$varo=str_replace("?","",$varo);
echo"<a href='".$catg."/$varo/".$row41['new_id']."' data-toggle='' data-target='' style='color:#00f;'> READ MORE</a></p>
<hr>";
echo" <div class='rewadmore-box'>
<span class='click-for'>Click for</span>
<h3><span><a href='".$row41['categoury']."/$varo/".$row41['new_id']."' data-toggle='' data-target=''> <span>'Behind The News'</span>  &amp; <span>'Beyond The News'</span></a></span></h3>
<div class='triangle-right'> </div>
</div>
<div class='thenew-share-box'>
<div class='main-button'>
<a class='share-menu btn' data-toggle='collapse' href='#share-icon-all3".$row41['new_id']."' aria-expanded='false' aria-controls='share-icon-all3".$row41['new_id']."'>
<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
<ul class='share-icon' id='share-icon-all3".$row41['new_id']."'>
<li><div data-href='https://www.newzworm.com/$catg/$varo/".$row41['new_id']."' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https://www.newzworm.com/$catg/$varo/".$row41['new_id']."&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
<li><a target='_blank' href='https://twitter.com/intent/tweet?text=".$varo."https://www.newzworm.com/$catg/$varo/".$row41['new_id']."'  data-size='large'><i class='fa fa-twitter twiter'></i></a></li>
";//<li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li>
echo"<li><a href='https://plus.google.com/share?url=https://www.newzworm.com/$catg/$varo/".$row41['new_id']."' target='_blank' onclick='javascript:window.open(this.href);return false;'><img src='https://www.gstatic.com/images/icons/gplus-32.png' alt='Share on Google+'/></a></li>
</ul>
</div>
</div>";
}
?>

</div>
<a data-slide="prev" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#monthslide" class="month-slider-left"><i class="fa fa-angle-left"></i></a>
<a data-slide="next" onclick="responsiveVoice.pause(); $('.fa-volume-up').hide();$('.fa-volume-off').show();" href="#monthslide" class="month-slider-right"><i class="fa fa-angle-right"></i></a>
</div>
</div>
<!--end white-box -->

</div>
<div class="col-lg-3 col-sm-3 col-xs-12 hidden-xs">
<!--start white-box -->
<?php
$que55 = $conn->query("SELECT * from news_update where sunday_news=1 ORDER BY RAND() LIMIT 3");
while($row55 = $que55->fetch_assoc())
{
$varo=str_replace(" ","-",$row55['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='TRENDING/".$varo."/".$row55['new_id']."'>
<div class='allcat-box'>
<span class='trand-tag'>TRENDING </span>
<img src='m/".$row55['image_url']."' class='img-responsive' alt='".$row55['new_title']."' title='".$row55['new_title']."'/>
<p class='ext-p'>".$row55['new_title']."... </p>
</div>
</a> ";}
?>
<!--end white-box -->
<!-- start white box -->

</div>
<div class="col-lg-3 col-sm-3 col-xs-12 hidden-xs">
<!--start white-box -->
<?php
$que55 = $conn->query("SELECT * from news_update where sunday_news=1 ORDER BY RAND() LIMIT 3");
while($row55 = $que55->fetch_assoc())
{
$varo=str_replace(" ","-",$row55['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='TRENDING/".$varo."/".$row55['new_id']."'>
<div class='allcat-box'>
<span class='trand-tag'>TRENDING </span>
<img src='m/".$row55['image_url']."' class='img-responsive' alt='".$row55['new_title']."' title='".$row55['new_title']."'/>
<p class='ext-p'>".$row55['new_title']."... </p>
</div>
</a> ";}
?>
<!--end white-box -->
<!-- start white box -->
</div>
</div>
</div>
</section>
<?php session_start();
include_once('inc/configuration1.php');
include_once('inc/configuration2.php');

if(empty($_SESSION['parent_email'])){ header('Location: index.php');}
 ?>
<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$username=$_SESSION['parent_email'];
$salt="TwBJboXe";


If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

                  }
	else {

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);

       if ($hash != $posted_hash) {
	      echo "Invalid Transaction. Please try again Later";
		   }
	   else {

       $st=1;
    $sent_issue=0;   
	   $upatestaus1=mysqli_query($con,"UPDATE nluser SET payment='$st' and sent_issue='$sent_issue' WHERE email='$username'");
	   $payment_dat=date('d-m-Y');
	   $upatestaus=mysqli_query($con,"UPDATE orders SET status='$st',`txn_id`='".$_POST['txnid']."',`payment_status`='".$_POST['status']."',`payment_date`='".$payment_dat."',`payer_email`='".$_POST['email']."'
WHERE  customerid='$username'");

          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ".Your order will soon be shipped.</h4>";

  $to = "himanshugupta9467@gmail.com";
  $subject = "Welcome to Newzworm family!";
  $message = "Hi,<br>Welcome To newzworm<br>Your registration has been successful with payment.<br> <br><b> Username:</b> $username<br>";
  $header = "MIME-Version: 1.0" . "\r\n";
  $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $header .= "From:newzworm@newzworm.com \r\n";
  $retval = mail ($to,$subject,$message,$header);
}
?>	</div>
 <meta http-equiv="refresh" content="4;url=https://www.newzworm.com/" />
 <br class="clear"/>
 </div>
 <?php unset($_SESSION['username']); ?>
 <?php //include_once('footer.php');?>
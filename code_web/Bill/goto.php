<?php 
session_start(); 
if (!isset($_SESSION['timeend'])){ 
    unset($_SESSION['timeend']);
    $endtime = time() + 5; 
    $_SESSION['timeend'] = $endtime; 
} 

($_SESSION['timeend'] - time()) < 0 ? $EndTime = 0 :  $EndTime = $_SESSION['timeend'] - time();

if($EndTime <= 0) { 
    unset($_SESSION['timeend']);
//session_destroy();    
} 

?>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
คุณจะได้รับใบเสร็จในอีก  <b><span id="timer" style="color:red;"><?php echo $EndTime?></span></b>  วินาที...

<script type="text/javascript"> 
var pastTime = <?php echo $EndTime;?>; 

function mycountdown(){ 
      if(pastTime > 0) { 
            pastTime -= 1; 
            document.getElementById('timer').innerHTML = pastTime; 
      } 
if(pastTime < 1) { 
            window.location = "http://localhost/shop/Bill/processing.php" //FIX THIS *****
      } 
} 
    if(pastTime >0){
        setInterval(mycountdown,1000); 
    }
</script>
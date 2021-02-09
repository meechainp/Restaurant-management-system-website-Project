<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$p_id = $_GET['m_id'];
$act = $_GET['act'];
if (empty($_SESSION["username"]) ) { 
	echo "<script type='text/javascript'>";
	echo "alert('กรุณาเข้าสู่ระบบ ก่อนเลือกเมนูอาหาร');";
	echo "window.location = 'login_member_index.php'; ";
	echo "</script>";
}
if ($act == 'add' && !empty($p_id)) {
	if (!isset($_SESSION['shopping_cart'])) {

		$_SESSION['shopping_cart'] = array();
	} else {
	}
	if (isset($_SESSION['shopping_cart'][$p_id])) {
		$_SESSION['shopping_cart'][$p_id]++;
	} else {
		$_SESSION['shopping_cart'][$p_id] = 1;
	}
}

if ($act == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
	unset($_SESSION['shopping_cart'][$p_id]);
}

if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$_SESSION['shopping_cart'][$p_id] = $amount;
	}
}
if ($act == 'Cancel-Cart') {
	unset($_SESSION['shopping_cart']);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cart</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-7">
				<form id="frmcart" name="frmcart" method="post" action="?act=update">
					<table width="100%" border="0" align="center" class="table table-hover">
						<tr>
							<td height="40" colspan="7" align="center" bgcolor="#CCCCCC"><strong><b>รายการอาหาร</span></strong></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
							<td align="center" bgcolor="#EAEAEA"><strong>ภาพอาหาร</strong></td>
							<td align="center" bgcolor="#EAEAEA"><strong>ชื่ออาหาร</strong></td>
							<td align="center" bgcolor="#EAEAEA"><strong>ราคา</strong></td>
							<td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
							<td align="center" bgcolor="#EAEAEA"><strong>รวม/รายการ</strong></td>
							<td align="center" bgcolor="#EAEAEA"><strong>ลบ</strong></td>
						</tr>
						<?php

						if (!empty($_SESSION['shopping_cart'])) {
							require_once('connect.php');
							foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
								$menu = $pdo->prepare("SELECT * from menu where menuId='$p_id'");
								$menu->execute();
								while ($row = $menu->fetch()) {
									$sum = $row['menuPrice'] * $p_qty;
									$total += $sum;
									echo "<tr>";
									echo "<td>";
									echo $i += 1;
									echo ".";
									echo "</td>";
									echo "<td width='100'>" . "<img src='admin/menuimg/$row[menuImg]'  width='50'/>" . "</td>";
									echo "<td width='334'>" . " " . $row["menuTHname"] . "</td>";
									echo "<td width='100' align='right'>" . number_format($row["menuPrice"], 2) . "</td>";

									echo "<td width='57' align='right'>";
									echo "<input type='text' name='amount[$p_id]' value='$p_qty' size='2'/></td>";

									echo "<td width='100' align='right'>" . number_format($sum, 2) . "</td>";
									echo "<td width='100' align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";

									echo "</tr>";
								}
							}
							echo "<tr>";
							echo "<td colspan='5' bgcolor='#CEE7FF' align='right'>Total</td>";
							echo "<td align='right' bgcolor='#CEE7FF'>";
							echo "<b>";
							echo  number_format($total, 2);
							echo "</b>";
							echo "</td>";
							echo "<td align='left' bgcolor='#CEE7FF'></td>";
							echo "</tr>";
						}
						?>
						<tr>
							<td></td>
							<td colspan="5" align="right">
								<a href="cart.php?act=Cancel-Cart" class="btn btn-danger"> ยกเลิกรายการ </a>
								<button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
								<button type="button" name="Submit2" onclick="window.location='confirm.php';" class="btn btn-primary">
									<span class="glyphicon glyphicon-shopping-cart"> </span> ยืนยันรายการ </button>
							</td>
						</tr>
				</form>
				<p align="center"> <a href="index.php" class="btn btn-primary">กลับไปหน้าเลือกอาหาร</a> </p>
			</div>
		</div>
	</div>
</body>

</html>
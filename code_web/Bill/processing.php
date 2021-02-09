<?php
session_start();
$staffId = $_SESSION['staffId'];
$receiptId = $_REQUEST["ID"];
//SET FONT  ----------------------------------------------------------------
define('FPDF_FONTPATH', 'fpdf17/font/');
require('fpdf17/fpdf.php');
$pdf = new FPDF();
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'B', 'THSarabunNew_b.php');
$pdf->AddPage();

//DATABASE  ----------------------------------------------------------------|

$link = mysqli_connect("localhost", "root", "");

mysqli_query($link, "Use mallikadata;");

$sql = "SELECT receipt.receiptId, cart.menuId, menuTHname, menuPrice, 
    cart.amount as c_amt, cart.totalPrice as c_tot,
    receipt.amount as r_amt, receipt.totalPrice as r_tot, receipt.tableId, receiptDate
FROM receipt, orders, cart , menu
WHERE receipt.receiptId = '$receiptId'
AND '$receiptId' = orders.receiptId
AND orders.orderId = cart.orderId
AND cart.menuId = menu.menuId;";

$result = mysqli_query($link, $sql);



//รวมที่เก็บตัวแปร  ------------------------------------------------------------|
$BeforeLeft = 10; //เส้นกั้นห่างจากซ้ายเท่าไร
$line = 125;
$headDetail = 115;
$posy = 115;



//หัวรายละเอียดบริษัท  ---------------------------------------------------------|

$pdf->Image('logo.fw_.png', 30, 12, 55, 15); //x,y,w,h
$pdf->Image('crop.png', 112, 9, 79, 28); //x,y,w,h

$pdf->SetFont('THSarabunNew', 'B', 15);
$pdf->Text($headDetail, 15, iconv('UTF-8', 'cp874', 'ชื่อบริษัท : '));
$pdf->Text($headDetail, 21, iconv('UTF-8', 'cp874', 'ที่อยู่ : '));
$pdf->Text($headDetail, 33, iconv('UTF-8', 'cp874', 'เบอร์โทรศัพท์ : '));


$pdf->SetFont('THSarabunNew', '', 15);
$pdf->Text(133, 15, iconv('UTF-8', 'cp874', 'เรือนมัลลิการ์'));
$pdf->Text(127, 21, iconv('UTF-8', 'cp874', '189 ซอย เศรษฐีทวีทรัพย์ แขวง คลองเตย'));
$pdf->Text(127, 27, iconv('UTF-8', 'cp874', 'เขตคลองเตย กรุงเทพมหานคร 10110'));
$pdf->Text(140, 33, iconv('UTF-8', 'cp874', '084-088-3755'));

//Toppics  ------------------------------------------------------------------|

$pdf->SetFont('THSarabunNew', 'B', 24);
$pdf->Text(75, 47, iconv('UTF-8', 'cp874', 'ใบเสร็จรับเงิน ( Receipt )'));

//รายละเอียดลูกค้า  ------------------------------------------------------------------|

$sql1 = "SELECT receipt.receiptId, cart.menuId, menuTHname, menuPrice, 
    cart.amount as c_amt, cart.totalPrice as c_tot,
    receipt.amount as r_amt, receipt.totalPrice as r_tot, receipt.tableId, receiptDate
FROM receipt, orders, cart , menu
WHERE receipt.receiptId = '$receiptId'
AND '$receiptId' = orders.receiptId
AND orders.orderId = cart.orderId
AND cart.menuId = menu.menuId;";

$result1 = mysqli_query($link, $sql1);
$showData1 = mysqli_fetch_array($result1);


$pdf->SetFont('THSarabunNew', 'B', 16);
$pdf->Text(13, 62, iconv('UTF-8', 'cp874', 'หมายเลขโต๊ะ :'));
$pdf->Text(13, 75, iconv('UTF-8', 'cp874', 'วันที่ - เวลา :'));
$pdf->Text(13, 88, iconv('UTF-8', 'cp874', 'เลขที่ใบเสร็จ :'));

$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Text(37, 62, $showData1['tableId']);
$pdf->Text(36, 75, $showData1['receiptDate']);
$pdf->Text(37, 88, $showData1['receiptId']);
$pdf->Text(160, 226, iconv('UTF-8', 'cp874', $showData1['r_tot'] . "   บาท"));

//หัวตาราง --------------------------------------------------------------------|
$pdf->SetFont('THSarabunNew', 'B', 15);
$pdf->Text(89, 100, iconv('UTF-8', 'cp874', 'รายละเอียดใบเสร็จ')); //x,y
$pdf->Line($BeforeLeft, 108, 190, 108);

// แสดงตารางสินค้า


$pdf->Text(15, $posy, iconv('UTF-8', 'cp874', 'รหัสสินค้า'));
$pdf->Text(55, $posy, iconv('UTF-8', 'cp874', 'รายละเอียด'));
$pdf->Text(104, $posy, iconv('UTF-8', 'cp874', 'จำนวน'));
$pdf->Text(127, $posy, iconv('UTF-8', 'cp874', 'หน่วยละ'));
$pdf->Text(152, $posy, iconv('UTF-8', 'cp874', 'ส่วนลด'));
$pdf->Text(172, $posy, iconv('UTF-8', 'cp874', 'จำนวนเงิน'));
$pdf->Line($BeforeLeft, 118, 190, 118);


//สีของคอลัมน์ตาราง
//$pdf->Image('blue20.png',112,9,79,28); //x,y,w,h

$pdf->Image('blue20.png', 10, 108, 180, 10); //x,y,w,h

$pdf->Image('blue20.png', 10, 108, 25, 107); //x,y,w,h
$pdf->Image('blue20.png', 10, 108, 25, 107); //x,y,w,h

$pdf->Image('blue20.png', 35, 108, 63, 107); //x,y,w,h

$pdf->Image('blue20.png', 98, 108, 23, 107); //x,y,w,h
$pdf->Image('blue20.png', 98, 108, 23, 107); //x,y,w,h

$pdf->Image('blue20.png', 121, 108, 25, 107); //x,y,w,h

$pdf->Image('blue20.png', 146, 108, 22, 107); //x,y,w,h
$pdf->Image('blue20.png', 146, 108, 22, 107); //x,y,w,h

$pdf->Image('blue20.png', 168, 108, 22, 107); //x,y,w,h




$pdf->SetFont('THSarabunNew', '', 15);
while ($showData = mysqli_fetch_array($result)) {
    $pdf->Text(16, $line, iconv('UTF-8', 'cp874', $showData['menuId']));
    $pdf->Text(38, $line, iconv('UTF-8', 'cp874', $showData['menuTHname']));
    $pdf->Text(109, $line, iconv('UTF-8', 'cp874', $showData['c_amt']));
    $pdf->Text(130, $line, iconv('UTF-8', 'cp874', $showData['menuPrice']));
    $pdf->Text(177, $line, iconv('UTF-8', 'cp874', $showData['c_tot']));


    $line = $line + 6;
}

$pdf->Line($BeforeLeft, 215, 190, 215);

$pdf->SetFont('THSarabunNew', 'B', 16);
//edit
//*$showDataTwo = mysqli_fetch_array($resultTwo)
$pdf->Text(120, 226, iconv('UTF-8', 'cp874', 'รวมเงิน          : '));


//query ข้อมูลในตาราง 
/* 
    $pdf->Text(178,$line,$showData['allPrice']);
    $pdf->Text(178,$line,$showData['tax']);
    $pdf->Text(178,$line,$showData['totalPrice']);*/

$pdf->Image('blue20.png', 10, 215, 180, 20); //x,y,w,h
$pdf->Line($BeforeLeft, 235, 190, 235);

$pdf->SetFont('THSarabunNew', 'B', 16);
$pdf->Text(10, 285, iconv('UTF-8', 'cp874', 'ลายเซ็นผู้รับเงิน .........................................'));
$pdf->Text(125, 285, iconv('UTF-8', 'cp874', 'ลายเซ็นผู้ชำระเงิน .........................................'));


//ปิด DATABASE  ---------------------------------------------------------------|
$closeDatabase = mysqli_close($link);
$pdf->Output();

<?php
session_start();

header("content-type:text/html; charset=utf-8");
require_once("config.php");
include('define.php');
include('definePlan.php');
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$email = $_SESSION['email'];

$sql = "select * from dbmember where email='$email'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$id = $row[0];

$sqlPlan = "select * from dbPlanner where mid='$id'";
$resultPlan = mysql_query($sqlPlan);
$rowPlan = mysql_fetch_row($resultPlan);
//登入dbPlanner找到對應的資料



//以下製作pdf
if($_POST['download']){
require('../fpdf/chinese-unicode.php');            //匯入剛剛下載的中文化的FPDF

$pdf=new PDF_Unicode();                    //建立PDF_Unicode

$pdf->Open();                              //開啟
$pdf->AddPage();                           //新的一頁

$pdf->AddUniCNShwFont('uni');              //加入中文
$pdf->SetFont('uni','',16);                //設定字型與字體大小

$pdf->SetFillColor(249,234,216);

//接著將資料放入一維陣列中
$title= array($row[1]."...".$rowPlan[2]);

$row0=array('國家 Country',$rowPlan[2],'城市 City',$rowPlan[3]);
$row1=array('匯率 Currency',$rowPlan[10],'電壓 Voltage',$rowPlan[7]);
$row2=array('出發時間 Date',$rowPlan[5],'回程時間 Date',$rowPlan[6]);

$row3=array('簽證 Visa');
$row31=array($rowPlan[4]);
$row4=array('插座 Socket');
$row41=array($rowPlan[8]);
$row5=array('氣候 Weather');
$row6=array($rowPlan[9]);
$row7=array('觀光 Tourism');
$row8=array($rowPlan[11]);
$row9=array('交通 Transit');
$row10=array($rowPlan[12]);
$row11=array('攜帶物品 Stuff');
$row12=array($rowPlan[13]);
$row13=array('注意事項 Attention');
$row14=array($rowPlan[14]);
$row15=array('其他 Others');
$row16=array($rowPlan[15]);
 
//將資料放入2維陣列中

$trowOne=array($title);
$trowTwo=array($row0,$row1,$row2);
$trowThree=array($row4,$row41,$row3,$row31,$row5,$row6,$row7,$row8,$row9,$row10,$row11,$row12,$row13,$row14,$row15,$row16);

//設定表格的寬度
$wOne=array(180);
$wTwo=array(45,45,45,45);
$wThree=array(180);




//迴圈
 for($j=0;$j<count($trowOne);$j++){
  for($i=0;$i<count($trowOne[$j]);$i++){
   $pdf->MultiCell($wOne[$i],7,$trowOne[$j][$i],0,'C',true);     //將資料放入表格內
  } $pdf->Ln();                                    //下一列
 }
  for($j=0;$j<count($trowTwo);$j++){
  for($i=0;$i<count($trowTwo[$j]);$i++){
   $pdf->Cell($wTwo[$i],7,$trowTwo[$j][$i],1,0,'L');   
  } $pdf->Ln();                                    
 }
  $pdf->Ln();
  
  for($j=0;$j<count($trowThree);$j++){
  for($i=0;$i<count($trowThree[$j]);$i++){
    if($j%2 == 0){
      $pdf->SetFillColor(251,255,179);
      $pdf->SetFont('uni','',12);
      $pdf->Cell($wThree[$i],7,$trowThree[$j][$i],1,0,'C',true);       
    }else{
      $pdf->MultiCell($wThree[$i],6,$trowThree[$j][$i],1,'L');
      
    } 
  } $pdf->Ln();                                    
 }


 $pdf->Output('enjoyyourlife.pdf','D');         //輸出呈現
}

//刪除資料
  if($_POST['delete']){
     $sqlDelete = "delete from dbPlanner where mid='$id'";
     mysql_query($sqlDelete);
     echo '<script> confirm("刪除完畢")</script>';
     header("refresh:0; 07.final.php");
     exit();
  }


?>















?>
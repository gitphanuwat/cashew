<?php
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);    
// เชื่อมต่อกับฐานข้อมูล      
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
// ดึงข้อมูลจากฐานข้อมูล ตามค่า id ของสถานที่ ที่ส่งมา 
//and tbbase.idbase='".$_GET['placeID']."'";
//and tbbase.idbase='25'";
$q="SELECT * FROM  tbbase,tbtype WHERE 
tbbase.idtype = tbtype.idtype
and tbbase.idbase='".$_GET['placeID']."'";
$qr=@mysql_db_query($database,$q);	
$rs=@mysql_fetch_assoc($qr);
?>
<!--จัดรูปแบบ ที่ต้องการแสดงตามต้องการ -->
<table width="250" border="0" cellspacing="2" cellpadding="0" align="left">  
  <tr align="left">  
    <td width="10" rowspan="4">  
    <img src="picture/<?php echo $rs['picture']?>"  
     width="130" height="80">  
    </td>  
    <td width="10">&nbsp;</td>  
    <td width="264"><?php echo $rs['namebase']?></td>  
  </tr>  
  <tr align="left">  
    <td>&nbsp;</td>  
    <td>กลุ่มงาน: <?php echo $rs['nametype']?></td>  
  </tr>  
  <tr align="left">  
    <td>&nbsp;</td>  
    <td>
    <?php if($rs['facebook']!=""){?>
    <a href='<?php echo $rs['facebook'];?>' title='ลิงค์ไปยังเฟสบุ๊ค' target="_blank"><span class="label label-primary">Facebook</span></a>
    <?php }?>
	<?php if($rs['website']!=""){?>
	<a href='<?php echo $rs['website'];?>' title='ลิงค์ไปยังเว็บไซต์' target="_blank"><span class="label label-success">Website</span></a>
    <?php }?>
    </td>  
  </tr>
  <tr>  
    <td>&nbsp;</td>  
    <td align="right">
    <a href='#<?php echo $rs['idbase'];?>' title='แสดงข้อมูล' class='showdetail'><span class="label label-info">รายละเอียด</span></a>
    </td>  
  </tr>  
</table>  
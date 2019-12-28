<?php require_once('../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conn, $conn);
$query_rdv = "SELECT * FROM rdv";
$rdv = mysql_query($query_rdv, $conn) or die(mysql_error());
$row_rdv = mysql_fetch_assoc($rdv);
$totalRows_rdv = mysql_num_rows($rdv);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>liste RDV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">  
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/cufon-replace.js" type="text/javascript"></script>
	<script src="js/Vegur_500.font.js" type="text/javascript"></script>
	<script src="js/Ropa_Sans_400.font.js" type="text/javascript"></script> 
	<script src="js/FF-cash.js" type="text/javascript"></script>	
	<script src="js/script.js" type="text/javascript"></script>  
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
		</a>
	</div>
	<![endif]-->
	<!--[if lt IE 9]>
 		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]--></head>
<body id="page5">
	<!--==============================header=================================-->
	<header>
		<div class="border-bot">
			<div class="main">
				<h1><a href="index.html">InternetCafe</a></h1>
				<nav>
					<ul class="menu">
						<li><a href="index.html">Acceuil</a></li>
						<li><a href="index1.html">Cabinet</a></li>
						<li><a href="index2.html">Services</a></li>
						<li><a href="index3.html">Personnel</a></li>
						<li><a class="" href="index4.html">Contacts</a></li>
					</ul>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	<!--==============================content================================-->
	<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - Mrach 03, 2012!</div>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
				  <div class="aligncenter"><strong>liste des RDV</strong></div>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  
                  <table width="870" border="1">
                    <tr>
                      <td width="-1">&nbsp;</td>
                      <td width="118"><div align="center">DATE</div></td>
                      <td width="100"><div align="center">HEURE</div></td>
                      <td width="4">&nbsp;</td>
                      <td width="147"><div align="center">PATIENT</div></td>
                      <td width="202"><div align="center">MEDECIN</div></td>
                      <td width="99">&nbsp;</td>
                      <td width="149">&nbsp;</td>
                    </tr>
                    <?php do { ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td><div align="center"><?php echo $row_rdv['date_rdv']; ?></div></td>
                        <td><div align="center"><?php echo $row_rdv['heure_rdv']; ?></div></td>
                        <td>&nbsp;</td>
                        <td><div align="center"><?php echo $row_rdv['id_patient']; ?></div></td>
                        <td><div align="center"><?php echo $row_rdv['id_medecin']; ?></div></td>
                        <td><div align="center"><a href="modif_rdv.php?n=<?php echo $row_rdv['n_rdv']; ?>">Modifier</a></div></td>
                        <td><div align="center"><a href="sup_rdv.php?n=<?php echo $row_rdv['n_rdv']; ?>">Supprimer</a></div></td>
                    </tr>
                      <?php } while ($row_rdv = mysql_fetch_assoc($rdv)); ?>
                  </table>
                  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				</div>
		  </div>
		</div>
	</section>
	<!--==============================footer=================================-->
	<footer></footer>
	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<?php
mysql_free_result($rdv);
?>
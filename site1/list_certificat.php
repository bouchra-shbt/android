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
$query_certificat = "SELECT * FROM certificat";
$certificat = mysql_query($query_certificat, $conn) or die(mysql_error());
$row_certificat = mysql_fetch_assoc($certificat);
$totalRows_certificat = mysql_num_rows($certificat);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>liste certificat</title>
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
	<![endif]-->
</head>
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
				  <div class="aligncenter"><strong>liste des certificats </strong></div>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  
                  <table width="816" border="1">
                    <tr>
                      <td width="76">&nbsp;</td>
                      <td width="144"><div align="center"><strong>DATE DEBUT</strong></div></td>
                      <td width="134"><div align="center"><strong>DATE DE FIN</strong></div></td>
                      <td width="107"><div align="center"><strong>CAUSE</strong></div></td>
                      <td width="110"><div align="center"><strong>N VISITE</strong></div></td>
                      <td width="66">&nbsp;</td>
                      <td width="133">&nbsp;</td>
                    </tr>
                    <?php do { ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td><div align="center"><?php echo $row_certificat['date_debut']; ?></div></td>
                        <td><div align="center"><?php echo $row_certificat['date_fin']; ?></div></td>
                        <td><div align="center"><?php echo $row_certificat['cause']; ?></div></td>
                        <td><div align="center"><?php echo $row_certificat['n_vi']; ?></div></td>
                        <td><div align="center"><a href="modif_certificat.php?id=<?php echo $row_certificat['id_cer']; ?>">Modifier</a></div></td>
                        <td><div align="center"><a href="sup_certificat.php?id=<?php echo $row_certificat['id_cer']; ?>">Supprimer</a></div></td>
                    </tr>
                      <?php } while ($row_certificat = mysql_fetch_assoc($certificat)); ?>
                  </table>
                  <p>&nbsp;</p>
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
mysql_free_result($certificat);
?>
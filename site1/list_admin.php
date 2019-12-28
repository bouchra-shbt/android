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

$maxRows_admin = 10;
$pageNum_admin = 0;
if (isset($_GET['pageNum_admin'])) {
  $pageNum_admin = $_GET['pageNum_admin'];
}
$startRow_admin = $pageNum_admin * $maxRows_admin;

mysql_select_db($database_conn, $conn);
$query_admin = "SELECT * FROM `admin`";
$query_limit_admin = sprintf("%s LIMIT %d, %d", $query_admin, $startRow_admin, $maxRows_admin);
$admin = mysql_query($query_limit_admin, $conn) or die(mysql_error());
$row_admin = mysql_fetch_assoc($admin);

if (isset($_GET['totalRows_admin'])) {
  $totalRows_admin = $_GET['totalRows_admin'];
} else {
  $all_admin = mysql_query($query_admin);
  $totalRows_admin = mysql_num_rows($all_admin);
}
$totalPages_admin = ceil($totalRows_admin/$maxRows_admin)-1;
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>liste admin</title>
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
	<div align="center">
	  <!--==============================header=================================-->
</div>
	<header>
		<div class="border-bot">
			<div class="main">
				<h1 align="center"><a href="index.html">InternetCafe</a></h1>
				<nav>
					<div align="center">
					  <ul class="menu">
					    <li><a href="index.html">Acceuil</a></li>
					    <li><a href="index1.html">Cabinet</a></li>
					    <li><a href="index2.html">Services</a></li>
					    <li><a href="index3.html">Personnel</a></li>
					    <li><a class="" href="index4.html">Contacts</a></li>
				      </ul>
				  </div>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	<div align="center">
	  <!--==============================content================================-->
</div>
	<section id="content"><div class="ic">
	  <div align="center">More Website Templates @ TemplateMonster.com - Mrach 03, 2012!</div>
	</div>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
				  <div class="aligncenter">
				    <div align="center"><strong>Liste des admin</strong></div>
				  </div>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  
                  <div align="center">
                    <table border="1">
                      <tr>
                        <td width="-1">&nbsp;</td>
                        <td width="128"><div align="center"><strong>NOM</strong></div></td>
                        <td width="143"><div align="center"><strong>PSEUDO</strong></div></td>
                        <td width="56">&nbsp;</td>
                        <td width="81">&nbsp;</td>
                      </tr>
                      <?php do { ?>
                        <tr>
                          <td>&nbsp;</td>
                          <td><div align="center"><?php echo $row_admin['nom_admin']; ?></div></td>
                          <td><div align="center"><?php echo $row_admin['pseudo_admin']; ?></div></td>
                          <td><div align="center"><a href="modif_admin.php?id=<?php echo $row_admin['id_admin']; ?>">Modifier</a></div></td>
                          <td><div align="center"><a href="sup_admin.php?id=<?php echo $row_admin['id_admin']; ?>">Supprimer</a></div></td>
                      </tr>
                        <?php } while ($row_admin = mysql_fetch_assoc($admin)); ?>
                    </table>
                  </div>
                  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				</div>
		  </div>
		</div>
	</section>
	<div align="center">
	  <!--==============================footer=================================-->
</div>
	<footer></footer>
	<div align="center">    </div>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<?php
mysql_free_result($admin);
?>
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
$var = trim( @$_GET['rech']);

mysql_select_db($database_conn, $conn);
$query_requette = "select * from medicament where n_med like   \"%$var%\"  ";
$requette = mysql_query($query_requette, $conn) or die(mysql_error());
$row_requette = mysql_fetch_assoc($requette);
$totalRows_requette = mysql_num_rows($requette);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>recher he medicament</title>
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
    <style type="text/css">
<!--
.Style1 {
	color: #0099FF;
	font-style: italic;
	font-size: 40px;
}
-->
    </style>
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
				  <div class="aligncenter"></div>
				  <p align="center"><strong>Rechercher medicament</strong></p>
				  <form name="form1" method="get" action="rech_medicament.php">
				    <table width="392" border="1" align="center">
                      <tr>
                        <td width="170" height="34">entrez N° du medicament</td>
<td width="146"><label>
                          <input type="text" name="rech" id="rech">
                        </label></td>
                        <td width="54">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><label>
                          <div align="center">
                            <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
                          </div>
                        </label></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </form>
				  <p align="center">&nbsp;</p>
				  <p>&nbsp;</p>
				  
                  <table width="695" border="1">
                    
      <?php do { ?>
                      <tr>
                        <td width="685"><p align="center" class="Style1">&nbsp;</p>
                          <p align="center" class="Style1">Information:</p>
                          <p><strong>Num medicament:</strong> <?php echo $row_requette['n_med']; ?></p>
                          <p> <strong>Nom medicament:</strong> <?php echo $row_requette['nom_med']; ?><strong> Nom commercial du medicament:</strong><?php echo $row_requette['nom_c_med']; ?></p>
                          <p><strong>Dosage:</strong> <?php echo $row_requette['dosage']; ?></p>
                          <p><strong>Pays fabriquant:</strong> <?php echo $row_requette['pays_f_med']; ?></p>
                          <p><strong>Generique:</strong> <?php echo $row_requette['generique']; ?></p>
                          <p><strong>Cond:</strong> <?php echo $row_requette['cond']; ?></p>
                          <p><strong>Frome:</strong> <?php echo $row_requette['frome']; ?></p>
                        <p><strong>Tarif de reference:</strong> <?php echo $row_requette['tarif_r']; ?></p></td>
            </tr>
                      <?php } while ($row_requette = mysql_fetch_assoc($requette)); ?>
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
mysql_free_result($requette);
?>
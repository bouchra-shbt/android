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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO assure (nass, tpc, date_f_d) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['nass'], "int"),
                       GetSQLValueString($_POST['tpc'], "double"),
                       GetSQLValueString($_POST['date_f_d'], "date"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>ajout assure</title>
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
	<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>  
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
	<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body id="page5">
	<div align="center">
	  <!--==============================header=================================-->
</div>
    <div align="center"></div>
<div align="center"></div>
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
				  <div class="aligncenter"><strong>Ajouter assuré
                      </strong>
				    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                      <table align="center">
                        <tr valign="baseline">
                          <td nowrap align="right">Numero d'assurance<strong> :</strong></td>
                          <td><strong>
                          <input type="text" name="nass" value="" size="32">
                          </strong></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Taux de prise en charge<strong> :</strong></td>
                          <td><strong>
                          <input type="text" name="tpc" value="" size="32">
                          </strong></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Date de prise en charge<strong> :</strong></td>
                          <td><span id="sprytextfield1">
                          <input type="text" name="date_f_d" value="" size="32">
                          <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">&nbsp;</td>
                          <td><strong>
                          <input type="submit" value="Insérer l'enregistrement">
                          </strong></td>
                        </tr>
                      </table>
                        <strong>
                        <input type="hidden" name="MM_insert" value="form1">
                        </strong>
				    </form>
				    <p>&nbsp;</p>
				  </div>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
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
	<script type="text/javascript">
Cufon.now();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", useCharacterMasking:true});
</script>
</body>
</html>
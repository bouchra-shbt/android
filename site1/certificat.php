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
  $insertSQL = sprintf("INSERT INTO certificat (id_cer, date_debut, date_fin, cause, n_vi) VALUES (NULL, %s, %s, %s, %s)",
                     
                       GetSQLValueString($_POST['date_debut'], "date"),
                       GetSQLValueString($_POST['date_fin'], "date"),
                       GetSQLValueString($_POST['cause'], "text"),
                       GetSQLValueString($_POST['n_vi'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "fiche_visite.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conn, $conn);
$query_certificat = "SELECT * FROM fiche_visite";
$certificat = mysql_query($query_certificat, $conn) or die(mysql_error());
$row_certificat = mysql_fetch_assoc($certificat);
$totalRows_certificat = mysql_num_rows($certificat);

mysql_select_db($database_conn, $conn);
$query_fichevisite = "SELECT * FROM fiche_visite";
$fichevisite = mysql_query($query_fichevisite, $conn) or die(mysql_error());
$row_fichevisite = mysql_fetch_assoc($fichevisite);
$totalRows_fichevisite = mysql_num_rows($fichevisite);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>ajout certificat</title>
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
				    <div align="center"><strong>Ajouter Certificat</strong></div>
				  </div>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  
                  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                    
                    <div align="center">
                      <table align="center">
                        <tr valign="baseline">
                          <td nowrap align="right">Date de debut :</td>
                          <td><span id="sprytextfield1">
                          <input type="text" name="date_debut" value="" size="32">
                          <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Date de fin :</td>
                          <td><span id="sprytextfield2">
                          <input type="text" name="date_fin" value="" size="32">
                          <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Cause :</td>
                          <td><input type="text" name="cause" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Numero de fiche visite :</td>
                          <td><label>
                            <select name="n_vi" size="1" id="n_vi">
                              <?php
do {  
?>
                              <option value="<?php echo $row_fichevisite['n_vi']?>"><?php echo $row_fichevisite['date_vis']?></option>
                              <?php
} while ($row_fichevisite = mysql_fetch_assoc($fichevisite));
  $rows = mysql_num_rows($fichevisite);
  if($rows > 0) {
      mysql_data_seek($fichevisite, 0);
	  $row_fichevisite = mysql_fetch_assoc($fichevisite);
  }
?>
                                </select>
                          </label></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">&nbsp;</td>
                          <td><input type="submit" value="Insérer l'enregistrement"></td>
                        </tr>
                      </table>
                      <input type="hidden" name="MM_insert" value="form1">
                    </div>
                  </form>
                  <p align="center">&nbsp;</p>
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
    <script type="text/javascript">
Cufon.now();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd", useCharacterMasking:true});
    </script>
</body>
</html>
<?php
mysql_free_result($certificat);

mysql_free_result($fichevisite);
?>
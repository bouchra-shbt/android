<?php require_once('Connections/conn.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO rdvd (id_rdvd, nom_rdvd, prenom_rdvd, tel_rdvd, email_rdvd, date_rdvd, heure_rdvd, mdp_rdvd) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_rdvd'], "int"),
                       GetSQLValueString($_POST['nom_rdvd'], "text"),
                       GetSQLValueString($_POST['prenom_rdvd'], "text"),
                       GetSQLValueString($_POST['tel_rdvd'], "text"),
                       GetSQLValueString($_POST['email_rdvd'], "text"),
                       GetSQLValueString($_POST['date_rdvd'], "date"),
                       GetSQLValueString($_POST['heure_rdvd'], "text"),
                       GetSQLValueString($_POST['mdp_rdvd'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE rdvd SET nom_rdvd=%s, prenom_rdvd=%s, tel_rdvd=%s, email_rdvd=%s, date_rdvd=%s, heure_rdvd=%s, mdp_rdvd=%s WHERE id_rdvd=%s",
                       GetSQLValueString($_POST['nom_rdvd'], "text"),
                       GetSQLValueString($_POST['prenom_rdvd'], "text"),
                       GetSQLValueString($_POST['tel_rdvd'], "text"),
                       GetSQLValueString($_POST['email_rdvd'], "text"),
                       GetSQLValueString($_POST['date_rdvd'], "date"),
                       GetSQLValueString($_POST['heure_rdvd'], "text"),
                       GetSQLValueString($_POST['mdp_rdvd'], "text"),
                       GetSQLValueString($_POST['id_rdvd'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_rdvd = "SELECT * FROM rdvd";
$rdvd = mysql_query($query_rdvd, $conn) or die(mysql_error());
$row_rdvd = mysql_fetch_assoc($rdvd);
$totalRows_rdvd = mysql_num_rows($rdvd);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<p>&nbsp;</p>

<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_rdvd:</td>
      <td><?php echo $row_rdvd['id_rdvd']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nom_rdvd:</td>
      <td><input type="text" name="nom_rdvd" value="<?php echo htmlentities($row_rdvd['nom_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Prenom_rdvd:</td>
      <td><input type="text" name="prenom_rdvd" value="<?php echo htmlentities($row_rdvd['prenom_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel_rdvd:</td>
      <td><input type="text" name="tel_rdvd" value="<?php echo htmlentities($row_rdvd['tel_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email_rdvd:</td>
      <td><input type="text" name="email_rdvd" value="<?php echo htmlentities($row_rdvd['email_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Date_rdvd:</td>
      <td><input type="text" name="date_rdvd" value="<?php echo htmlentities($row_rdvd['date_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Heure_rdvd:</td>
      <td><input type="text" name="heure_rdvd" value="<?php echo htmlentities($row_rdvd['heure_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mdp_rdvd:</td>
      <td><input type="text" name="mdp_rdvd" value="<?php echo htmlentities($row_rdvd['mdp_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Mettre &agrave; jour l'enregistrement" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form2" />
  <input type="hidden" name="id_rdvd" value="<?php echo $row_rdvd['id_rdvd']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rdvd);
?>

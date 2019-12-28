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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE patient SET nom_patient=%s, prenom_patient=%s, date_naiss_patient=%s, lieu_naiss_patient=%s, sexe_patient=%s, adresse_patient=%s, cp_patient=%s, tel_pat=%s, n_sc_patient=%s, sf_patient=%s, n_as=%s, email_patient=%s, motpasse_patient=%s WHERE id_patient=%s",
                       GetSQLValueString($_POST['nom_patient'], "text"),
                       GetSQLValueString($_POST['prenom_patient'], "text"),
                       GetSQLValueString($_POST['date_naiss_patient'], "date"),
                       GetSQLValueString($_POST['lieu_naiss_patient'], "text"),
                       GetSQLValueString($_POST['sexe_patient'], "text"),
                       GetSQLValueString($_POST['adresse_patient'], "text"),
                       GetSQLValueString($_POST['cp_patient'], "text"),
                       GetSQLValueString($_POST['tel_pat'], "text"),
                       GetSQLValueString($_POST['n_sc_patient'], "text"),
                       GetSQLValueString($_POST['sf_patient'], "text"),
                       GetSQLValueString($_POST['n_as'], "int"),
                       GetSQLValueString($_POST['email_patient'], "text"),
                       GetSQLValueString($_POST['motpasse_patient'], "text"),
                       GetSQLValueString($_POST['id_patient'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
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
$query_Recordset1 = "SELECT * FROM patient";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['id_rdvd'])) {
  $colname_Recordset2 = $_GET['id_rdvd'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset2 = sprintf("SELECT * FROM rdvd WHERE id_rdvd = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $conn) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_patient:</td>
      <td><?php echo $row_Recordset1['id_patient']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nom_patient:</td>
      <td><input type="text" name="nom_patient" value="<?php echo htmlentities($row_Recordset1['nom_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Prenom_patient:</td>
      <td><input type="text" name="prenom_patient" value="<?php echo htmlentities($row_Recordset1['prenom_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Date_naiss_patient:</td>
      <td><input type="text" name="date_naiss_patient" value="<?php echo htmlentities($row_Recordset1['date_naiss_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lieu_naiss_patient:</td>
      <td><input type="text" name="lieu_naiss_patient" value="<?php echo htmlentities($row_Recordset1['lieu_naiss_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sexe_patient:</td>
      <td><input type="text" name="sexe_patient" value="<?php echo htmlentities($row_Recordset1['sexe_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Adresse_patient:</td>
      <td><input type="text" name="adresse_patient" value="<?php echo htmlentities($row_Recordset1['adresse_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cp_patient:</td>
      <td><input type="text" name="cp_patient" value="<?php echo htmlentities($row_Recordset1['cp_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel_pat:</td>
      <td><input type="text" name="tel_pat" value="<?php echo htmlentities($row_Recordset1['tel_pat'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">N_sc_patient:</td>
      <td><input type="text" name="n_sc_patient" value="<?php echo htmlentities($row_Recordset1['n_sc_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sf_patient:</td>
      <td><input type="text" name="sf_patient" value="<?php echo htmlentities($row_Recordset1['sf_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">N_as:</td>
      <td><input type="text" name="n_as" value="<?php echo htmlentities($row_Recordset1['n_as'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email_patient:</td>
      <td><input type="text" name="email_patient" value="<?php echo htmlentities($row_Recordset1['email_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Motpasse_patient:</td>
      <td><input type="text" name="motpasse_patient" value="<?php echo htmlentities($row_Recordset1['motpasse_patient'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Mettre &agrave; jour l'enregistrement" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_patient" value="<?php echo $row_Recordset1['id_patient']; ?>" />
</form>
<p>&nbsp;</p>

<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_rdvd:</td>
      <td><?php echo $row_Recordset2['id_rdvd']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nom_rdvd:</td>
      <td><input type="text" name="nom_rdvd" value="<?php echo htmlentities($row_Recordset2['nom_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Prenom_rdvd:</td>
      <td><input type="text" name="prenom_rdvd" value="<?php echo htmlentities($row_Recordset2['prenom_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel_rdvd:</td>
      <td><input type="text" name="tel_rdvd" value="<?php echo htmlentities($row_Recordset2['tel_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email_rdvd:</td>
      <td><input type="text" name="email_rdvd" value="<?php echo htmlentities($row_Recordset2['email_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Date_rdvd:</td>
      <td><input type="text" name="date_rdvd" value="<?php echo htmlentities($row_Recordset2['date_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Heure_rdvd:</td>
      <td><input type="text" name="heure_rdvd" value="<?php echo htmlentities($row_Recordset2['heure_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mdp_rdvd:</td>
      <td><input type="text" name="mdp_rdvd" value="<?php echo htmlentities($row_Recordset2['mdp_rdvd'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Mettre &agrave; jour l'enregistrement" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form2" />
  <input type="hidden" name="id_rdvd" value="<?php echo $row_Recordset2['id_rdvd']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>

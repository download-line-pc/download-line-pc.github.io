<?
$host="192.168.0.100";
$username="downlo13_line";
$password="@Db@5674";
$database="downlo13_line";

$mysqli = mysqli_connect("$host", "$username", "$password", "$database") or die ("Can't connect database! ");
$mysqli->query("set names utf8");

$site_config="SELECT * FROM site_config WHERE site_id='1'";
$site_config = mysqli_query($mysqli, $site_config);
$site=mysqli_fetch_array($site_config);

?>
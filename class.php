<?
class Page
{
function header()
{ 
?>
<html>
<head>
 <title>��� ��. �. �. ��������� ����������� ��������</title>
 <meta http-equiv="Content-Type" content="text/html;  charset=windows=1251">
 <META name="Author" content="http://ailus.ru"><meta name="Copyright" content="http://ailus.ru">
 </head>
 
 <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bottommargin="0" bgcolor="#ffffff">
 <link href="index.css" type="text/css" rel="STYLESHEET">
 
 <table border=1 width=100% height=20%>
 <tr>
 <td width=100% height=20% align=center> ������������ ������ �� ����� "���������� �������� �����������" <br> ��������� ������ ��-153: ����� ������ � �������� ���� <br> ��������: �. �. �. ���. ������� �. �.</td>
 
 </table>
 
 <table border=1 width=100%>
<td width=30%  align=left valign=top>
 
<a href="orderform.php"> ������ ������������ �a���� </a>
<br><br>
<a href="orderform_2.php"> ������ ������������ �a���� </a>
<br><br>
<a href="orderform_3_1.php"> ������ ������������ �a���� </a>
<br><br>
<a href="orderform_4.php"> ��������� ������������ �a���� </a>
<br><br>
<a href="index_5.php"> ����� ������������ �a���� </a>
<br><br>
<a href="index_6.php"> ������ ������������ �a���� </a>

</td>
<td width=70%  align=center>

<?

}

function footer()

{
?>
</td>
</table>


<table border=1 width=100% height=10%>

	<td width=100% height=10% align=center> ����������� �������� (������) ��� ��. �. �. ���������, ������� �������������� ������� � �������������� ����������, 2017</td>

</table>
</body>
</html>
<?
}

function orderform()
{
?>
<html>
<head>
	<title>������������ "������"</title>
</head>
<h1>������������ ������ � 3 �� ����: ���������� � �������������� ������ ����������� ���� - MySQL</h1>
<h2>������������ "������"</h2>
<h3>����� ������</h3>

<form action="processorder_3_1.php" method=post>
<table border=0>
<tr bgcolor=#cccccc>
	<td width=150>�����</td>
	<td width=15>����������</td>
</tr>
<tr>
	<td>��������</td>
	<td align="left"><input type="text" name="cakeqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>�������</td>
	<td align="left"><input type="text" name="candyqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>�������</td>
	<td align="left"><input type="text" name="cookieqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>��� �������</td>
	<td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
</tr>
<tr>
	<td>����� ��������</td>
	<td align="left"><input type="text" name="address" size="40" maxlength="40"></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="��������� �����"></td>
</tr>
</table>
</form>
</body>
</html>
<?
}

function connect()
{

$hostname="localhost";
$user="root";
$password="";
$db="lab3";

if(!$link = mysql_connect($hostname, $user, $password))

{
	echo "<br> �� ���� ����������� � �������� ���� ������<br>";
	exit();
}
echo "<br> ���������� � �������� ���� ������ ������ �������<br>";

if(!mysql_select_db($db, $link))
{
	echo "<br> �� ���� ������� ���� ������<br>";
	exit();
}
else
{
	echo "<br> ����� ���� ������ ������ �������<br>";
}

}

function processorder($cakeqty, $candyqty, $cookieqty, $fio, $address)
{
?>
<html>
<head>
	<title>������������ "������" - ���������� ������</title>
</head>
<body>

<h1> ������������ ������ � 3 �� ����: "���������� � �������������� ������ ����������� ���� - MySQL"</h1>
<h2>������������ "������"</h2>
<h3>���������� ������</h3>

<?
		$totalqty=0;
	$totalqty += $cakeqty;
	$totalqty += $candyqty;
	$totalqty += $cookieqty;

	$totalamount= 0.00;
	
	define('CAKEPRICE',50);
	define('CANDYPRICE',150);
	define('COOKIEPRICE', 60);
	
	$date = date('H:i, jS F');
	
	echo '<p>����� ��������� � ';
	echo $date;
	echo'<br />';
	echo '<p>������ ������ ������: ';
	echo '<br />';

	if ($totalqty==0)
	{
		echo '�� ������ �� �������� �� ���������� ��������!<br />';
	}
	else
	{
		if ($cakeqty>0) echo $cakeqty. ' �������� <br />';
		if ($candyqty>0) echo $candyqty. ' ������� ������ <br />';
		if ($cookieqty>0) echo $cookieqty. ' ������� <br />';
	}

	$total = $cakeqty*CAKEPRICE + $candyqty*CANDYPRICE+$cookieqty*COOKIEPRICE;
	$total=number_format($total,2,'.',' ');
	

	echo '<p> ����� � ������: '.$total.'</p>';
	echo '<p> ��� �������: '.$fio.'</p>';
	echo '<p> ����� ��������: '.$address.'<br />';

	$outputstring = $date."\t".$cakeqty." ��������\t".$candyqty."  ������� ������\t".$cookiqty." �������\t\$".$total."\t ����� �������� ������: \t". $address."\t ��� �������: ".$fio."\n";

//������� ���� ��� ����������

	$date_1=date("Y-m-d h:i:s", mktime());

	$query="insert into zakaz(fio, address, data) values('$fio','$address', '$date_1')";
	$result=mysql_query($query);

	$query_1="select zakaz.id  from zakaz where zakaz.fio='$fio' ";
	$result_1=mysql_query($query_1);
	
	
	while($row=mysql_fetch_array($result_1))
	{ 	
		$id=$row["id"];
	}

	$query="insert into tovar (id, cakeqty, candyqty, cookieqty) values('$id', '$cakeqty', '$candyqty', '$cookieqty')";
	$result=mysql_query($query);

	echo'<p>����� ��������.</p>';
?>

<a href="vieworders_3_1.php"> ��������� ��������� ��� ��������� ����� �������</a>

</body>
</html>
<?
}

function vieworders()
{
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	
?>
<html>
<head>
	<title>������������ "������" - ������ ��������</title>
</head>
<body>

<h1> ������������ ������ � 3 �� ����: "���������� � �������������� ������ ����������� ���� MySQL"</h2>
<h3>������ ��������</h3>
<?
$query_1="select zakaz.id, zakaz.fio, zakaz.address, zakaz.data, tovar.id, tovar.cakeqty, tovar.candyqty, tovar.cookieqty from zakaz, tovar where zakaz.id=tovar.id order by zakaz.data";
$result_1=mysql_query($query_1);
?>

<table border=1 color=black width=100% height=100%>
<tr>
<td><b>�</b></td><td><b>���</b></td><td><b>�����</b></td><td><b>���� ������</b></td><td><b>��������</b></td><td><b>�������</b></td><td><b>�������</b></td>

<?
while($row_1=mysql_fetch_array($result_1))
{
	$id=$row_1["id"];
	$fio=$row_1["fio"];
	$address=$row_1["address"];
	$data=$row_1["data"];
	$cakeqty=$row_1["cakeqty"];
	$candyqty=$row_1["candyqty"];
	$cookieqty=$row_1["cookieqty"];
?><tr>

<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $address ?> </td><td> <? echo $data ?> </td><td> <? echo $cakeqty ?> </td><td> <? echo $candyqty ?> </td><td> <? echo $cookieqty ?> </td>

</tr>
<?

}

?> </table> 
</body>
</html>

<?

}

}

?>
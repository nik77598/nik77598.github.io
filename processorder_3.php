<?php
require('header.inc');
?>

<?php
	$henqty =$_POST['henqty'];
	$cowqty=$_POST['cowqty'];
	$nonmeatqty=$_POST['nonmeatqty'];
	$address=$_POST['address'];
        $fio = $_POST['fio'];

	$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
	
$hostname="localhost";
$user="root";
$password="";
$db="lab_3";

if(!$link = mysql_connect($hostname, $user, $password))

{
	//echo "<br> �� ���� ����������� � �������� ���� ������<br>";
	exit();
}
echo "<br> ���������� � �������� ���� ������ ������ �������<br>";

if(!mysql_select_db($db, $link))
{
	//echo "<br> �� ���� ������� ���� ������<br>";
	exit();
}
else
{
	echo "<br> ����� ���� ������ ������ �������<br>";
}
?>
<html>
<head>
	<title>�������� "������� �� ����" - ���������� ������</title>
</head>
<body>

<h1> ������������ ������ � 3 �� ����: "���������� � �������������� ������ ����������� ���� - MySQL"</h1>
<h2>�������� "������� �� ����"</h2>
<h3>���������� ������</h3>

<?php
		$totalqty=0;
	$totalqty += $henqty;
	$totalqty += $cowqty;
	$totalqty += $nonmeatqty;

	$totalamount= 0.00;
	
	define('HENPRICE',50);
	define('COWPRICE',150);
	define('NONMEATPRICE', 60);
	
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
		if ($henqty>0) echo $henqty. ' �������� �������� <br />';
		if ($cowqty>0) echo $cowqty. ' �������� ������� <br />';
		if ($nonmeatqty>0) echo $nonmeatqty. ' �������� �������������� <br />';
	}

	$total = $henqty*HENPRICE + $cowqty*COWPRICE+$nonmeatqty*NONMEATPRICE;
	$total=number_format($total,2,'.',' ');
	

	echo '<p> ����� � ������: '.$total.'</p>';
	echo '<p> ��� �������: '.$fio.'</p>';
	echo '<p> ����� ��������: '.$address.'<br />';

	$outputstring = $date."\t".$henqty." �������� ��������\t".$cowqty."  �������� �������\t".$nonmeatqty." �������� ��������������\t\$".$total."\t ����� �������� ������\t". $address."\t ��� �������: ".$fio."\n";

//������� ���� ��� ����������

	$date_1=date("Y-m-d h:i:s", mktime());

	$query="insert into zakaz(fio, address, date) values('$fio','$address', '$date_1')";
	$result=mysql_query($query);

	$query_1="select zakaz.id  from zakaz where zakaz.fio='$fio' ";
	$result_1=mysql_query($query_1);
	
	
	while($row=mysql_fetch_array($result_1))
	{ 	
		$id=$row["id"];
	}

	$query="insert into tovar (id, henqty, cowqty, nonmeatqty) values('$id', '$henqty', '$cowqty', '$nonmeatqty')";
	$result=mysql_query($query);

	echo'<p>����� ��������.</p>';
?>

<a href="vieworders_3.php"> ��������� ��������� ��� ��������� ����� �������</a>

</body>
</html>
<?php
require('footer.inc');
?>
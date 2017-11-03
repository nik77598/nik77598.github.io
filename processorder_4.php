<?php
require('header.inc');
?>

<?php
	$henqty =$_POST['henqty'];
	$cowqty=$_POST['cowqty'];
	$nonmeatqty=$_POST['nonmeatqty'];
	$address=$_POST['address'];
	$fio=$_POST['fio'];
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<head>
	<title>�������� "������� �� ����" - ���������� ������</title>
</head>
<body>

<h1> ������������ ������ � 4 �� ����: "���������� � ��c����������� ������ ����������� ������������ �������� � ��������� ������"</h1>
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
		if ($cowqty>0) echo $cowdyqty. ' �������� ������� <br />';
		if ($nonmeatqty>0) echo $nonmeatqty. ' �������� �������������� <br />';
	}

	$total = $henqty*HENPRICE + $cowqty*COWPRICE+$nonmeatqty*NONMEATPRICE;
	$total=number_format($total,2,'.',' ');
	

	echo '<p> ����� � ������: '.$total.'</p>';
	echo '<p> ��� �������: '.$fio.'</p>';
	echo '<p> ����� ��������: '.$address.'<br />';

	$product=array("$date", "$henqty", "$cowqty", "$nonmeatqty", "$total", "$address", "$fio");
	$outputstring = $product[0]."\t".$product[1]." �������� ��������\t".$product[2]."  �������� �������\t".$product[3]." �������� ��������������\t".$product[4]."\t ����� �������� ������: \t". $product[5]."\t ��� �������: \t".$product[6]."\n";


	//������� ���� ��� ����������

	$fp = fopen("orders_4.txt", 'a');

	flock($fp, LOCK_EX);

	if(!$fp)
	{
		echo '<p><strong>� ��������� ������ ��� ������ �� ����� ���� ��������. '. '.</strong></p></body></html>';
	exit;

	}
	fwrite($fp, $outputstring);
	flock($fp, LOCK_UN);
	fclose($fp);

	echo '<p>����� ��������.</p>';
?>

<a href="vieworders_4.php"> ��������� ��������� ��� ��������� �����</a>

</body>
</html>

<?php
require('footer.inc');
?>

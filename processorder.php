<?php
require('header.inc');
?>
<html>
<head>
 <title>������� �� ���� - ���������� ������</title>
</head>
<body>
<h1>��� 1 </h1>
<h2>������� �� ����</h2>
<h3>���������� ������</h3>
<?php
  echo '<p>����� ��������� � ';
  echo date('H:i, jS F');
  echo '</p>';

$henqty = $_POST['henqty'];
$cowqty = $_POST['cowqty'];
$nonmeatqty = $_POST['nonmeatqty'];
$find = $_POST['find'];

echo '<p>������ ������ ������: </p>';
echo $henqty . ' ��. ������ ������ ��������  </br>';
echo $cowqty . ' ��. ������ ������ ������� </br>';
echo $nonmeatqty . ' ��. ������ ������ �������������� </br>';


$totalqty = 0;
$totalqty = $henqty + $cowqty + $nonmeatqty + $filqty;
echo '�������� �������: ' .$totalqty.'</br>';

$totalamount = 0.00;

define('HENRICE', 5);
define('COWPRICE', 6);
define('NONMEATPRICE', 4);

$totalamount = $henqty * HENPRICE
+ $cowqty * COWPRICE
+ $nonmeatqty * NONMEATPRICE;
echo '�����: $' .number_format($totalamount,3). '</br>';

$taxrate = 0.10; 
$totalamount = $totalamount * (1 + $taxrate);
echo '�����, ������� ����� � ������: $' . number_format 
($totalamount,2). '<br>';

?>
�� ������ ��� ����� �������� ��� ������� �����: <? echo "$find"; ?>
</body>
</html>
<?php
require('footer.inc');
?>

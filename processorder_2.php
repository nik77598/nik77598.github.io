<?php
require('header.inc');
?>

<?php
$henqty = $_POST['henqty'];
$cowqty = $_POST['cowqty'];
$nonmeatqty = $_POST['nonmeatqty'];
$address = $_POST['address'];
$fio = $_POST['fio'];

$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
?>
<html>
    <head>
        <title>������� �� ���� - ���������� ������</title>
    </head>
    <body>
        <h1>������������ ������ 2</h1>
        <h2>������� �� ����</h2>
        <h3>���������� ������</h3>
        
        
        <?php
            $totalqty = 0;
$totalqty += $henqty;
$totalqty += $cowqty;
$totalqty += $nonmeatqty;

$totalamount = 0.00;


define('HENPRICE', 5);
define('COWPRICE', 6);
define('NONMEATPRICE', 4);

$date = date('H:i, js F');

echo '<p> ����� ��������� � ';
echo $date;
echo '<br/>';
echo '<p>������ ������ ������ ';
echo '<br/>';
    if ( $totalqty == 0 )
{
    echo '�� ������ �� �������� �� ���������� ��������! <br/>';
}
else
{
    if ( $henqty > 0)
        echo $henqty.' � �������<br/>';
    if ($cowqty > 0)
        echo $cowqty.' � ���������<br/>';
    if ($nonmeatqty>0)
        echo $nonmeatqty.' � �������<br/>';
}
$total = $henqty * HENPRICE + $cowqty * COWPRICE + $nonmeatqty * NONMEATPRICE;
$total=number_format($total, 2, '.', ' ');
echo '<P> ����� �� ������: '.$total.'</p>';
echo '<P> ��� �������: '.$fio. '</p>';
echo '<P> ����� ��������: ' .$address. ' <br /> ';
$outputstring = $date. "\t" .$henqty. " � ������� \t" .$cowqty. " � ���������\t"
    .$nonmeatqty." � �������\t\$".$total
    ."\t ����� �������� ������\t ". $address. "\t ��� �������:" .$fio. " \n";
// ������� ���� ��� ����������
$fp = fopen ("orders.txt", 'a');

flock($fp, LOCK_EX);
if (!$fp)
{   
    echo '<p><strong> � ������ ������ ��� ������ �� ����� ���� ��������� '.'����������, ����������� �����. </strong></p></body></html>';
    exit;
}
fwrite($fp, $outputstring);
flock($fp, LOCK_UN);
fclose($fp);

echo '<p>����� ���������.</p>';
?>
        <a href="vieworders_2.php"> ��������� ��������� ��� ��������� ������� � �������</a>
        
        
        </body>
    </html>




<?php
    
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
        <title>Бургеры от Сэма - результаты заказа</title>
    </head>
    <body>
        <h1>Лабораторная работа 2</h1>
        <h2>Бургеры от Сэма</h2>
        <h3>Результаты заказа</h3>
        
        
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

echo '<p> Заказ обработан в ';
echo $date;
echo '<br/>';
echo '<p>Список вашего заказа ';
echo '<br/>';
    if ( $totalqty == 0 )
{
    echo 'Вы ничего не заказали на предыдущей странице! <br/>';
}
else
{
    if ( $henqty > 0)
        echo $henqty.' с курицей<br/>';
    if ($cowqty > 0)
        echo $cowqty.' с говядиной<br/>';
    if ($nonmeatqty>0)
        echo $nonmeatqty.' с овощами<br/>';
}
$total = $henqty * HENPRICE + $cowqty * COWPRICE + $nonmeatqty * NONMEATPRICE;
$total=number_format($total, 2, '.', ' ');
echo '<P> Итого по заказу: '.$total.'</p>';
echo '<P> ФИО клиента: '.$fio. '</p>';
echo '<P> Адрес доставки: ' .$address. ' <br /> ';
$outputstring = $date. "\t" .$henqty. " с курицей \t" .$cowqty. " с говядиной\t"
    .$nonmeatqty." с овощами\t\$".$total
    ."\t Адрес доставки товара\t ". $address. "\t ФИО клиента:" .$fio. " \n";
// Открыть файл для добавления
$fp = fopen ("orders.txt", 'a');

flock($fp, LOCK_EX);
if (!$fp)
{   
    echo '<p><strong> В данный момент ваш запрос не может быть обработан '.'Пожалуйста, попытайтесь позже. </strong></p></body></html>';
    exit;
}
fwrite($fp, $outputstring);
flock($fp, LOCK_UN);
fclose($fp);

echo '<p>Заказ обработан.</p>';
?>
        <a href="vieworders_2.php"> Интерфейс персонала для просмотра отчётов о заказах</a>
        
        
        </body>
    </html>




<?php
    
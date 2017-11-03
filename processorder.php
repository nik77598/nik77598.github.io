<?php
require('header.inc');
?>
<html>
<head>
 <title>Бургеры от Сэма - Результаты заказа</title>
</head>
<body>
<h1>Лаб 1 </h1>
<h2>Бургеры от Сэма</h2>
<h3>Результаты заказа</h3>
<?php
  echo '<p>Заказ обработан в ';
  echo date('H:i, jS F');
  echo '</p>';

$henqty = $_POST['henqty'];
$cowqty = $_POST['cowqty'];
$nonmeatqty = $_POST['nonmeatqty'];
$find = $_POST['find'];

echo '<p>Список вашего заказа: </p>';
echo $henqty . ' шт. товара Бургер куринный  </br>';
echo $cowqty . ' шт. товара Бургер говяжий </br>';
echo $nonmeatqty . ' шт. товара Бургер вегетарианский </br>';


$totalqty = 0;
$totalqty = $henqty + $cowqty + $nonmeatqty + $filqty;
echo 'Заказано товаров: ' .$totalqty.'</br>';

$totalamount = 0.00;

define('HENRICE', 5);
define('COWPRICE', 6);
define('NONMEATPRICE', 4);

$totalamount = $henqty * HENPRICE
+ $cowqty * COWPRICE
+ $nonmeatqty * NONMEATPRICE;
echo 'Итого: $' .number_format($totalamount,3). '</br>';

$taxrate = 0.10; 
$totalamount = $totalamount * (1 + $taxrate);
echo 'Всего, включая налог с продаж: $' . number_format 
($totalamount,2). '<br>';

?>
На вопрос как нашли компанию был получен ответ: <? echo "$find"; ?>
</body>
</html>
<?php
require('footer.inc');
?>

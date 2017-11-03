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
	<title>Ресторан "Бургеры от Сэма" - Результаты заказа</title>
</head>
<body>

<h1> Лабораторная работа № 4 по теме: "Сохранение и воcстановление данных посредством испоьзования массивов и текстовых файлов"</h1>
<h2>Ресторан "Бургеры от Сэма"</h2>
<h3>Результаты заказа</h3>

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
	
	echo '<p>Заказ обработан в ';
	echo $date;
	echo'<br />';
	echo '<p>Список вашего заказа: ';
	echo '<br />';

	if ($totalqty==0)
	{
		echo 'Вы ничего не заказали на предыдущей странице!<br />';
	}
	else
	{
		if ($henqty>0) echo $henqty. ' бургеров куринных <br />';
		if ($cowqty>0) echo $cowdyqty. ' бургеров говяжих <br />';
		if ($nonmeatqty>0) echo $nonmeatqty. ' бургеров вегетарианских <br />';
	}

	$total = $henqty*HENPRICE + $cowqty*COWPRICE+$nonmeatqty*NONMEATPRICE;
	$total=number_format($total,2,'.',' ');
	

	echo '<p> Итого к заказу: '.$total.'</p>';
	echo '<p> ФИО клиента: '.$fio.'</p>';
	echo '<p> Адрес доставки: '.$address.'<br />';

	$product=array("$date", "$henqty", "$cowqty", "$nonmeatqty", "$total", "$address", "$fio");
	$outputstring = $product[0]."\t".$product[1]." бургеров куринных\t".$product[2]."  бургеров говяжих\t".$product[3]." бургеров вегетарианских\t".$product[4]."\t Адрес доставки товара: \t". $product[5]."\t ФИО клиента: \t".$product[6]."\n";


	//Открыть файл для добавления

	$fp = fopen("orders_4.txt", 'a');

	flock($fp, LOCK_EX);

	if(!$fp)
	{
		echo '<p><strong>В настоящий момент ваш запрос не может быть обрботан. '. '.</strong></p></body></html>';
	exit;

	}
	fwrite($fp, $outputstring);
	flock($fp, LOCK_UN);
	fclose($fp);

	echo '<p>Заказ сохранен.</p>';
?>

<a href="vieworders_4.php"> Интерфейс персонала для просмотра файла</a>

</body>
</html>

<?php
require('footer.inc');
?>

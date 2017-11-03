<?php
require('header.inc');
?>
<html>
<head>
	<title>Ресторан "Бургеры от Сэма"</title>
</head>
<h1>Лабораторная работа № 3 по теме: Сохранение и восстановление данных посредством СУБД - MySQL</h1>
<h2>Ресторан "Бургеры от Сэма"</h2>
<h3>Форма заказа</h3>

<form action="processorder_3.php" method=post>
<table border=0>
<tr bgcolor=#cccccc>
	<td width=150>Товар</td>
	<td width=15>Количество</td>
</tr>
<tr>
	<td>Бургер куринный</td>
	<td align="left"><input type="text" name="henqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>Бургер говяжий</td>
	<td align="left"><input type="text" name="cowqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>Бургер вегетарианский</td>
	<td align="left"><input type="text" name="nonmeatqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>ФИО клиента</td>
	<td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
</tr>
<tr>
	<td>Адрес доставки</td>
	<td align="left"><input type="text" name="address" size="40" maxlength="40"></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="Отправить заказ"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');
?>
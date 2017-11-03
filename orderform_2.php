<?php
require('header.inc');
?>
<html>
<head>
 <title>Бургеры от Сэма</title>

</head>
<body>

<h1>Лабораторная работа №2 по теме сохранение и восстановление данных посредсвом текстовых файлов</h1>

<h2>Бургеры от Сэма</h2>
<h3>Форма заказа</h3>

<form action="processorder_2.php" method=post>
<table border=0>
<tr bgcolor=#cccccc>
<td width=150>Вид бургера</td>
<td width=15>Количество</td>
</tr>
<tr>
  <td>Бургер куринный</td>
  <td align="left"><input type="text" name="henqty" size= "3" maxlength="3"></td>
</tr>
<tr>
  <td>Бургер говяжий</td>
  <td align="left"><input type="text" name="cowqty" size= "3" maxlength="3"></td>
</tr>
<tr>
 <td>Бургер вегетарианский</td>
  <td align="left"><input type="text" name="nonmeatqty" size= "3" maxlength="3"></td>
</tr>
<tr>
<td>ФИО клиента</td>
  <td align="left"><input type="text" name="fio" size= "40" maxlength="40"></td>
</tr>
<tr>
<td>Адрес доставки</td>
  <td align="left"><input type="text" name="address" size= "40" maxlength="40"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value= "Отправить заказ"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');
?>
<?php
require('header.inc');
?>

<h1> ������������ ������ � 4 �� ����: "���������� � ��c����������� ������ ����������� ������������� �������� � ��������� ������"</h2>
<h2>������ ��������</h2>

<?php
//���������� ����� �����
//������ ����� ���������� ��������� �������
$orders=file("orders_4.txt");
//������� ��������� �������, ���������� � �������
$number_of_orders=count($orders);

echo '���������� �������: ',"$number_of_orders";

if ($number_of_orders == 0)
{
	echo '<p><strong>��� ��������� �������. ����������, ����������� �����.</strong></p>';
}

echo '<table border=1>';
echo '<tr><th bgcolor=\"#CCCCFF\"> ���� ������ </th>' . 
		'<th bgcolor=\"#CCCCFF\">�������� �������� </th>' .
		'<th bgcolor=\"#CCCCFF\">�������� ������� </th>'.
		'<th bgcolor=\"#CCCCFF\">�������� �������������� </th>'.
		'<th bgcolor=\"#CCCCFF\">����� </th>'.
		'<th bgcolor=\"#CCCCFF\">����� ������� </th>'.
		'<th bgcolor=\"#CCCCFF\">��� ������� </th>'.
	'</tr>';

for ($i=0; $i<$number_of_orders; $i++)
{
	//��������� �����
	$line = explode("\t", $orders[$i]);
	//���������� ������ ���������� ���������� �������
	$line[1]=intval($line[1]);
	$line[2]=intval($line[2]);
	$line[3]=intval($line[3]);
	//����� �������
	echo "<tr><td>$line[0]</td>
				<td align='right'>$line[1]</td>
				<td align='right'>$line[2]</td>
				<td align='right'>$line[3]</td>
				<td align='right'>$line[4]</td>
				<td>$line[6]</td>
				<td>$line[8]</td>
	
	</tr>";
}

echo "</table>";


require('footer.inc');
?>
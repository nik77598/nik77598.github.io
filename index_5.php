<?php
require('page_5.inc');

$homepage = new Page();

$homepage -> SetContent('<p>Лабораторная работа по теме: ООП на PHP </p>');

$homepage -> SetTitle('Лабораторная работа по теме: ООП на PHP ');
$homepage -> SetName('лабораторные работы по курсу: Разработка итнернет приложений посредством PHP и MySQL <br> Студентов группы ПИ-153: Литау Никиты и Новикова Ильи <br> Проверил: к. т. н. доц. Назимов А. С.');

$homepage -> Display();
?>
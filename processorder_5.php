<?php
require('page_5.inc');

class OrderfornPage extends Page 

{
	var $row2buttons=array ('Re-engineering'=>'reengineering.php','Standarts Compliance'=>'standards','Buzzword Compliance'=>'buzzword.php','Mission Statements'=>'mission');
	
	function Display_1($cakeqty)
	
	{	
		echo $cakeqty;
	}
	
	function Display($cakeqty, $candyqty,$cookieqty, $address, $DOCUMENT_ROOT,$fio)
	
	{
		echo "<html>\n<head>\n";	
		$this->DisplayTitle();
		$this->DisplayKeywords();	
		$this->DisplayStyles();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayMenu(this->buttons);
		$this->DisplayMenu(this->row2buttons);
		?> <table width=100% height=100% border = 1><tr><td class=cont> <? echo $this->order($cakeqty, $candyqty,$cookieqty, $address, $DOCUMENT_ROOT,$fio); ?> </td></table> <?
	
		//echo $this->content;
		$this->DisplayFooter();	
		echo "</body>\n</html>\n";
	}
	
	function order($cakeqty, $candyqty,$cookieqty, $address, $DOCUMENT_ROOT,$fio)
	{
		
	}
}

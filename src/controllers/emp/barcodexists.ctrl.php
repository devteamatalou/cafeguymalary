<?php
 require "../../../vendor/autoload.php";

 use src\dao\EmpDao;
 $empDao = new EmpDao();

	if ($_POST)
	{
		extract($_POST);
		$barcode = htmlspecialchars($barcode);

		if($empDao->checkBarcodeExists($barcode))
			echo '1';
		else
		 echo '0';
	}

?>
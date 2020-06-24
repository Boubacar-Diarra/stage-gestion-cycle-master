<?php
session_start();
require_once '../models/ConnecToDataBase.php';

    $db = ConnecToDataBase::connecToDataBaseName('gem');
  	
  	if(isset($_POST['numero']))
  	{
  		$temp = (int)$_POST['numero'];
  		if($temp >= 1 && $temp <=2)
  		{
          $_SESSION['OpOk'] = true;
			   ConnecToDataBase::insertAllInfoIntoSemestre($_POST, $db);
         header('Location: ../views/OK.php');
  		}
  		else{
        $_SESSION['OpOk'] = false;
  			header('Location: ../views/FormulaireForCreateSemestre.php');
      }
  	}
 	else{
    $_SESSION['OpOk'] = false;
    header('Location: ../views/FormulaireForCreateSemestre.php');
  }
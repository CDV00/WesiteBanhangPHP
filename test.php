<?php

	require_once "config.php";
	require_once PATH_TO_CORE.'db.php';
	require_once PATH_TO_CORE.'basemodel.php';
	require_once PATH_TO_CORE."adminmodel.php";
	require_once PATH_TO_ADMINMODEL."adminproductmodel.php";
	$mp=new AdminProductModel;
	$mp->delete(26);
	/*
	require_once 'mvc/lib/paging.php';
	$basepath='product/home';
	$totalRecords=80;
	$offset=70;
	$paging = new Paging($basepath,$totalRecords,LIMIT,$offset);
	$paging->createLinks();
	
	require_once PATH_TO_CORE.'db.php';
	require_once PATH_TO_CORE.'basemodel.php';
	
	$model=new BaseModel;
	$rows=$model->getAll(['trash'=>0,'status'=>1]);
	echo '<pre>';
	print_r($rows);
	echo '</pre>';
	/*
	//protected $ff ='caodinhvu_product';
	//echo DB_PREFIX;
	//$db=new Db;
	//$sql="'select * from '.echo DB_PREFIX;.'_link'";
	//$row=$db->queryAll($sql);
	//var_dump($row);
	
		$db=new Db;
		echo "ket noi thanh cong";
		$sql="select * from caodinhvu_product";
		$row=$db->queryAll($sql);
		var_dump($row);
	*/
	

?>

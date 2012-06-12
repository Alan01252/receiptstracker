<?php
$this->breadcrumbs=array(
	'Receipts',
);

$this->menu=array(
	array('label'=>'Create Receipt','url'=>array('create')),
	array('label'=>'Manage Receipt','url'=>array('admin')),
);
?>

<h1>Receipts</h1>


<?php 


	$this->widget('bootstrap.widgets.BootGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
	'columns'=>array(
			'id',
			'company.name',
			'goods',
			'vat',
			'total',
			'date',
			),
	)); ?>

<?php
$this->breadcrumbs=array(
	'Companies',
);

$this->menu=array(
	array('label'=>'Create Company','url'=>array('create')),
	array('label'=>'Manage Company','url'=>array('admin')),
);
?>

<h1>Companies</h1>

<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
	'columns'=>array(
			'id',
			'name',
			array(
					'class'=>'bootstrap.widgets.BootButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
			),
		),
)); ?>

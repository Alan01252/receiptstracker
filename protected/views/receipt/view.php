<?php
$this->breadcrumbs=array(
	'Receipts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Receipt','url'=>array('index')),
	array('label'=>'Create Receipt','url'=>array('create')),
	array('label'=>'Update Receipt','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Receipt','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Receipt','url'=>array('admin')),
);
?>

<h1>View Receipt #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'companyid',
		'goods',
		'vat',
		'total',
		'date',
	),
)); ?>

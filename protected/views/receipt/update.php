<?php
$this->breadcrumbs=array(
	'Receipts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Receipt','url'=>array('index')),
	array('label'=>'Create Receipt','url'=>array('create')),
	array('label'=>'View Receipt','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Receipt','url'=>array('admin')),
);
?>

<h1>Update Receipt <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
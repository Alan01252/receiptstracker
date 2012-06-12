<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Company','url'=>array('index')),
	array('label'=>'Create Company','url'=>array('create')),
	array('label'=>'View Company','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Company','url'=>array('admin')),
);
?>

<h1>Update Company <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
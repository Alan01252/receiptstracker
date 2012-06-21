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

<div>
<?php 
		$this->widget('bootstrap.widgets.BootButton', array(
				'buttonType'=>'submit',
				'label'=>'Export to csv',
				'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'size'=>'mini', // '', 'large', 'small' or 'mini'
				'htmlOptions' => array('class'=>'pull-right','submit'=>array('receipt/export')),
		));
		
?>
</div>

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
			array(
					'class'=>'bootstrap.widgets.BootButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
			),
			),
	)); 
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyid')); ?>:</b>
	<?php echo CHtml::encode($data->companyid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('goods')); ?>:</b>
	<?php echo CHtml::encode($data->goods); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vat')); ?>:</b>
	<?php echo CHtml::encode($data->vat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>
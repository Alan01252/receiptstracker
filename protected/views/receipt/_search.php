<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'companyid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'goods',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'vat',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

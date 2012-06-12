<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'receipt-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<input type="hidden" name='Receipt[companyid]' id='companyid'>
	
	 <?php echo CHtml::activeLabel($model,'Company'); ?>
	
	<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	     'name'=>'companyselector',
	     'source'=>CController::createUrl('company/search'),
	     'options'=>array(
	         'minLength'=>'1',
	     	 'select'=>"js:function(event, ui) {
	     			$('#companyid').val(ui.item.id);
	     		}"
			),
	     'htmlOptions'=>array(
	         'style'=>'height:20px;'
	     ),
		)); ?>
 
	<?php echo $form->textFieldRow($model,'goods',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'vat',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'total',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

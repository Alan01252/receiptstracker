<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'receipt-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<input type="hidden" name='Receipt[companyid]' id='companyid' value= <?php echo $model->getAttribute('companyid');?>>
	
	 <?php echo CHtml::activeLabel($model,'Company'); ?>
	
	<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	     'name'=>'Receipt[companyname]',
		 'value' =>$model->getCompanyName(),
	     'source'=>CController::createUrl('company/search'),
	     'options'=>array(
	        'minLength'=>'1',
	     	 'select'=>"js:function(event, ui) {
	     			$('#companyid').val(ui.item.id);
	     		}"
			),
	     'htmlOptions'=>array(
	         'style'=>'height:20px;',
	     	 'placeholder'=>'Enter a company name'
	     ),
		)); ?>
 
	<?php echo $form->textFieldRow($model,'goods',array('class'=>'span5','maxlength'=>10,'placeholder'=>'Enter a goods amount')); ?>

	<?php echo $form->textFieldRow($model,'vat',array('class'=>'span5','maxlength'=>10,'placeholder'=>'Enter a VAT amount')); ?>

	<?php echo $form->textFieldRow($model,'total',array('class'=>'span5','maxlength'=>10,'placeholder'=>'Enter a total amount')); ?>

	<?php echo $form->datepickerRow($model,'date',array('class'=>'span5','placeholder'=>'Pick a date','options'=>array('dateFormat'=>'yy-mm-dd'))); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

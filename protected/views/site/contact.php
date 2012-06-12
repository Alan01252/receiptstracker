<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    	'id'=>'verticalForm',
    	'htmlOptions'=>array('class'=>'well'),
)); ?> 

<fieldset class="control-group">
  	<legend>Fields with <span class="required">*</span> are required.</legend>

	<?php echo $form->textFieldRow($model, 'name', array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model, 'subject', array('class'=>'span3')); ?>
  	<?php echo $form->textAreaRow($model, 'body', array('class'=>'span8', 'rows'=>5)); ?>


	<?php if(CCaptcha::checkRequirements()): ?>

		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>

	<?php endif; ?>
	<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'ok', 'label'=>'Submit')); ?>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
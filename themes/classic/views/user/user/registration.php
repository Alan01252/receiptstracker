<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">


<?php 
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
		'id'=>'registration-form',
		'enableAjaxValidation'=>true,
		'clientOptions'=>array(
				'validateOnSubmit'=>true,
		),
		'htmlOptions' => array('enctype'=>'multipart/form-data','class'=>'well'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span3')); ?>
	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3')); ?>
	
	<div>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	<?php echo $form->passwordFieldRow($model,'verifyPassword',array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span3')); ?>

<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textAreaRow($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div>
	<?php $this->widget('CCaptcha'); ?>
	</div>
	<?php echo $form->textFieldRow($model,'verifyCode'); ?>
	<?php echo $form->error($model,'verifyCode'); ?>
	
	<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above. (All characters are letters not numbers)"); ?>
	<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>

	<?php endif; ?>
	
	<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Register')); ?>


<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>
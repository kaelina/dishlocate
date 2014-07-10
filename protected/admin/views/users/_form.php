<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
        <?php $disabled = ($model->isNewRecord) ? false : 'disabled'; ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30, 'disabled'=>$disabled)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
    <hr />
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'email2'); ?>
        <?php echo $form->textField($model,'email2',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'email2'); ?>
    </div>
    <hr />
    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password2'); ?>
        <?php echo $form->passwordField($model,'password2',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'password2'); ?>
    </div>
    <hr />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
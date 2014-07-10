<?php
/* @var $this MenuitemsController */
/* @var $model Menuitems */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menuitems-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'restaurantId'); ?>
        <?php $list = CHtml::listData(Restaurants::model()->findAll( array( 'order'=>'restaurant' )), 'id', 'restaurant'); ?>
        <?php echo $form->dropDownList($model, 'restaurantId', $list, array('empty'=>'(Select a Restaurant)')); ?>
        <?php echo $form->error($model,'restaurantId'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'menuitem'); ?>
		<?php echo $form->textField($model,'menuitem',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'menuitem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
        <?php echo $form->dropDownList($model, 'price', $model->getFormPriceStatus(), array('empty' => 'Select')); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
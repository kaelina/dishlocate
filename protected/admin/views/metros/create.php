<?php
/* @var $this MetrosController */
/* @var $model Metros */

$this->breadcrumbs=array(
	'Metros'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Metros', 'url'=>array('index')),
	array('label'=>'Manage Metros', 'url'=>array('admin')),
);
?>

<h1>Add new Metro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
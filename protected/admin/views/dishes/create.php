<?php
/* @var $this DishesController */
/* @var $model Dishes */

$this->breadcrumbs=array(
	'Dishes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dishes', 'url'=>array('index')),
	array('label'=>'Manage Dishes', 'url'=>array('admin')),
);
?>

<h1>Add new Dish</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
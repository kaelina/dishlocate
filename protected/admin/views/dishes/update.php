<?php
/* @var $this DishesController */
/* @var $model Dishes */

$this->breadcrumbs=array(
	'Dishes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dishes', 'url'=>array('index')),
	array('label'=>'Create Dishes', 'url'=>array('create')),
	array('label'=>'View Dishes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dishes', 'url'=>array('admin')),
);
?>

<h1>Update Dish: <?php echo $model->dish; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this RestaurantsController */
/* @var $model Restaurants */

$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Restaurants', 'url'=>array('index')),
	array('label'=>'Create Restaurants', 'url'=>array('create')),
	array('label'=>'View Restaurants', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Restaurants', 'url'=>array('admin')),
);
?>

<h1>Update Restaurant: <?php echo $model->restaurant; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
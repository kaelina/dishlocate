<?php
/* @var $this MenuitemsController */
/* @var $model Menuitems */

$this->breadcrumbs=array(
	'Menuitems'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menuitems', 'url'=>array('index')),
	array('label'=>'Create Menuitems', 'url'=>array('create')),
	array('label'=>'View Menuitems', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Menuitems', 'url'=>array('admin')),
);
?>

<h1>Update Menu Item: <?php echo $model->menuitem; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
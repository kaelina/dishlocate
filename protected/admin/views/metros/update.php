<?php
/* @var $this MetrosController */
/* @var $model Metros */

$this->breadcrumbs=array(
	'Metros'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'List Metros', 'url'=>array('index')),
	array('label'=>'Create Metros', 'url'=>array('create')),
	array('label'=>'View Metros', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Metros', 'url'=>array('admin')),
);
?>

<h1>Update Metro: <?php echo $model->metro; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
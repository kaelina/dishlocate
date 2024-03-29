<?php
/* @var $this MetrosController */
/* @var $model Metros */

$this->breadcrumbs=array(
	'Metroses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Metros', 'url'=>array('index')),
	array('label'=>'Create Metros', 'url'=>array('create')),
	array('label'=>'Update Metros', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Metros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Metros', 'url'=>array('admin')),
);
?>

<h1>View Metro: <?php echo $model->metro; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'metro',
		'description',
		'state',
		'latitude',
		'longitude',
	),
)); ?>

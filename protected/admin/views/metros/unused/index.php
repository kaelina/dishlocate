<?php
/* @var $this MetrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Metroses',
);

$this->menu=array(
	array('label'=>'Create Metros', 'url'=>array('create')),
	array('label'=>'Manage Metros', 'url'=>array('admin')),
);
?>

<h1>Metroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

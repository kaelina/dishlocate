<?php
/* @var $this LocationsController */
/* @var $model Locations */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Create Locations', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#locations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Locations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'metroId',
            'value'=>'$data->metros->metro',
            'filter'=>CHtml::listData(Metros::model()->findAll( array( 'order'=>'metro' )), 'id', 'metro')
        ),
		array(
            'name'=>'restaurantId',
            'value'=>'$data->restaurants->restaurant',
            'filter'=>CHtml::listData(Restaurants::model()->findAll( array( 'order'=>'restaurant' )), 'id', 'restaurant')
        ),
		'address1',
		//'address2',
		'city',
		'state',
		//'zip',
		//'phone',
        array(
            'name'=>'isOpen',
            'value'=>'$data->isOpen ? "Yes" : "No"',
            'filter'=>CHtml::listData($model->getBooleanStatus(), 'id', 'title'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

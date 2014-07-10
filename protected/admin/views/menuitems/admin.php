<?php
/* @var $this MenuitemsController */
/* @var $model Menuitems */

$this->breadcrumbs=array(
	'Menuitems'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Menuitems', 'url'=>array('index')),
	array('label'=>'Create Menuitems', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menuitems-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Menuitems</h1>

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
	'id'=>'menuitems-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'restaurantId',
            'value'=>'$data->restaurants->restaurant',
            'filter'=>CHtml::listData(Restaurants::model()->findAll( array( 'order'=>'restaurant' )), 'id', 'restaurant')
        ),
		'menuitem',
		'description',
		array(
            'name'=>'price',
            'value'=>array($model,'gridDisplayPrice'),
            'filter'=>CHtml::listData($model->getPriceStatus(), 'id', 'title'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

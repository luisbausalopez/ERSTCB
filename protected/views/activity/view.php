<?php
$this->breadcrumbs=array(
	'Activities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Activity','url'=>array('index')),
	array('label'=>'Create Activity','url'=>array('create')),
	array('label'=>'Update Activity','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Activity','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Activity','url'=>array('admin')),
);
?>

<h1>View Activity #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'aname',
		'atype',
		'description',
	),
)); ?>

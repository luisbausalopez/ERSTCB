<?php
$this->breadcrumbs=array(
	'People'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Person','url'=>array('index')),
	array('label'=>'Create Person','url'=>array('create')),
	array('label'=>'Update Person','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Person','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Person','url'=>array('admin')),
);
?>

<h1>View Person #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'firstname',
		'lastname',
		'email',
	),
)); ?>

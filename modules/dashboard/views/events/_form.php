<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
//use kartik\widgets\DateTimePicker
/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */

$id_profesor = Yii::$app->user->identity->id_profesor;
?>
<?php
if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date'])) {
	$model->event_start_date = Yii::$app->dateformatter->getDTFormat($_REQUEST['start_date']);
	$model->event_end_date = Yii::$app->dateformatter->getDTFormat($_REQUEST['start_date']);
}
if(isset($_REQUEST['event_id'])) {
	echo '<div class="visible-xs-4 col-sm-3 col-lg-3 pull-right">';
	if(isset($_GET['return_dashboard'])) {
		if ($id_profesor == $model->id_profesor){
		echo Html::a('<i class="fa fa-trash-o"></i> '.Yii::t('app', 'Remove'), ['events/event-delete', 'e_id' => $_REQUEST['event_id'], 'return_dashboard'=>1], ['class' => 'btn btn-danger btn-block', 'title' => Yii::t('app', 'Remove/Delete Event'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post'],]);
		}
	} else {


	   	if ($id_profesor == $model->id_profesor){
	    
		echo Html::a('<i class="fa fa-trash-o"></i> '.Yii::t('app', 'Remove'), ['events/event-delete', 'e_id' => $_REQUEST['event_id']], ['class' => 'btn btn-danger btn-block', 'title' => Yii::t('app', 'Remove/Delete Event'), 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post'],]);
		}
	} 
	echo '</div>';
	
	$model->event_start_date = Yii::$app->formatter->asDateTime($model->event_start_date);
	$model->event_end_date = Yii::$app->formatter->asDateTime($model->event_end_date);
}
?>
<div class="col-xs-12 col-lg-12">
<div class="events-form">

    <?php $form = ActiveForm::begin([
			'id' => 'events-form',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <div class="col-xs-12 col-sm-12 col-lg-12">    
    <?= $form->field($model, 'event_title')->textInput(['maxlength' => 80]) ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_detail')->textArea(['maxlength' => 255]) ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_start_date')->widget(DateTimePicker::classname(), [
			'type' => DateTimePicker::TYPE_INPUT,
			'options' => ['placeholder' => '', 'readOnly' => true],
			'pluginOptions' => [
				'autoclose' => true,
				'maxView' => 0,
				'startView' => 0,
				'format' => 'dd-mm-yyyy hh:ii:ss',
			], 
		]);
    ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_end_date')->widget(DateTimePicker::classname(), [
			'type' => DateTimePicker::TYPE_INPUT,
			'options' => ['placeholder' => '', 'readOnly' => true],
			'pluginOptions' => [
				'autoclose' => true,
				'format' => 'dd-mm-yyyy hh:ii:ss',
			], 
		]);
    ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'event_type')->dropDownList([1 => 'Escolar', 2 => 'Semiescolar'],['prompt'=> Yii::t('app', '--- Seleccionar ---')]); ?>
    </div>

    <div class="form-group col-xs-12 col-sm-6 col-lg-5 no-padding edusecArLangCss">
	<div class="col-xs-6">
	   <?php

	   	if ($id_profesor == $model->id_profesor){
	    ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Modificar'), ['class' => $model->isNewRecord  ? 'btn btn-success btn-block' : 'btn btn-info btn-block']) ?> 
        <?php
    	}
    	?>
	</div>
	<div class="col-xs-6">
	<?php 
		if ($id_profesor == $model->id_profesor){
		if(isset($_GET['return_dashboard'])) 
		echo Html::a(Yii::t('app', 'Cancel'), ['/dashboard'], ['class' => 'btn btn-default btn-block']);
	      else
		echo Html::a(Yii::t('app', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-block']);
	    }
	?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>

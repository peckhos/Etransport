<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\tours;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'res_num')->textInput() ?>

    <?= $form->field($model, 'num_of_ppl')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'toursupplier_id')->textInput() ?>

      <?= $form->field($model, 'tour_id')->dropDownList(
                ArrayHelper:: map(Tours::find()->all(),'id','tour_name' ),
                ['prompt'=>'Select Driver']
                
                ) ?>

    <?= $form->field($model, 'guest_id')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'dos')->textInput() ?>

    <?= $form->field($model, 'buses_required')->textInput() ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

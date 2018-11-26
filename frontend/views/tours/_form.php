<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tours */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tours-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tour_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'max_on_tour')->textInput() ?>

    <?= $form->field($model, 'tour_duration')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

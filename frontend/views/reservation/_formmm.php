<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\tours;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use buttflattery\formwizard\FormWizard;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */
/* @var $form yii\widgets\ActiveForm */




echo FormWizard::widget([
     'theme' => FormWizard::THEME_ARROWS,
    'steps'=>[
        [
            'model'=>$model,
            'title'=>'Select a Tour ',
            'description'=>'Select the Tour you would like to book',
            'formInfoText'=>'Fill all fields',
             'fieldConfig' => [
                'except' => ['dos', 'buses_required', 'comments'], // all fields except these will be added in the step
                     'tour_id' => [
                        'options' => [
                            'type' => 'dropdown',
                             ArrayHelper:: map(tours::find()->all(),'id','tour_name' ),
                             // 'itemsList' => [0 => 'Indoor', 1 => 'Outdoor'], //the list can be from the database
                            'prompt' => 'Please select a Tour',
                        ]
                    ],
            ]
        ],
        [
            'model'=> $model,
            'title'=>'Select a Date',
            'description'=>'Select the Date of your Tour',
            'formInfoText'=>'Fill all fields',
              'fieldConfig' => [
                'only' => ['dos', 'buses_required', 'comments'], // only these field will be added in the step, rest all will be hidden/ignored.
                   'dos' => [
                        'widget' => DatePicker::class, //widget class name
                        'options' => [ // you will pass the widget options here
                            'options' => [
                                'placeholder' => 'Select a Date',
                                'id' => 'my-datepicker',
                                'class' => 'form-control',
                                'autocomplete' => 'off'
                            ],
                            'dateFormat'=>'short'
                        ],
                    ]
            ]
        ],
    ]
]);
?>






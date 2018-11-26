<?
use buttflattery\formwizard\FormWizard;
use yii\jui\DatePicker;
echo FormWizard::widget([
        'steps' => [
            [
                'model' => $shootsModel,
                'title' => 'My Shoots',
                'description' => 'Add your shoots',
                'formInfoText' => 'Fill all fields',
                'fieldConfig' => [
                    'updated_at'=>false, //hide a specific field
                    'description' => [
                        'options' => [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'cols' => 25,
                            'rows' => 10
                        ]
                    ],
                    'shoot_type' => [
                        'options' => [
                            'type' => 'dropdown',
                            'itemsList' => [0 => 'Indoor', 1 => 'Outdoor'], //the list can be from the database
                            'prompt' => 'Please select a value',
                        ]
                    ],
                    'active' => [
                        'labelOptions' => [
                            'label' => 'Activate User'
                        ],
                        'options' => [
                            'type' => 'radio',
                            'itemsList' => [0 => 'No', 1 => 'Yes'], // the radio inputs to be created for the radioList
                        ]
                    ],
                    'created_at' => [
                        'widget' => DatePicker::class, //widget class name
                        'options' => [ // you will pass the widget options here
                            'options' => [
                                'placeholder' => 'Select a Date',
                                'id' => 'my-datepicker',
                                'class' => 'form-control'
                            ],
                            'dateFormat'=>'short'
                        ],
                    ]
                ]
            ],
            [
                'model'=>$shootTagModel,
                'title'=>'Shoot Tags',
                'description'=>'Add Shoot Tags',
                'formInfoText'=>'Fill all required fields'
            ]
        ]
    ]);
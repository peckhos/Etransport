<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reps".
 *
 * @property int $id
 * @property string $rep_name
 * @property int $location_id
 *
 * @property Guests[] $guests
 * @property Locations $location
 */
class Reps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rep_name', 'location_id'], 'required'],
            [['rep_name'], 'string'],
            [['location_id'], 'integer'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rep_name' => 'Rep Name',
            'location_id' => 'Location ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuests()
    {
        return $this->hasMany(Guests::className(), ['rep_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Locations::className(), ['id' => 'location_id']);
    }
}

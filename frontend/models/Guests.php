<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guests".
 *
 * @property int $id
 * @property string $name
 * @property int $adult
 * @property int $children
 * @property int $room_num
 * @property int $location_id
 * @property int $rep_id
 *
 * @property Locations $location
 * @property Reps $rep
 * @property Reservation[] $reservations
 */
class Guests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adult', 'children', 'room_num', 'location_id', 'rep_id'], 'required'],
            [['name'], 'string'],
            [['adult', 'children', 'room_num', 'location_id', 'rep_id'], 'integer'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['rep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reps::className(), 'targetAttribute' => ['rep_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'adult' => 'Adult',
            'children' => 'Children',
            'room_num' => 'Room Num',
            'location_id' => 'Location ID',
            'rep_id' => 'Rep ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Locations::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRep()
    {
        return $this->hasOne(Reps::className(), ['id' => 'rep_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['guest_id' => 'id']);
    }
}

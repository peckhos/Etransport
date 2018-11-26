<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departure_times".
 *
 * @property int $id
 * @property string $departure_time
 *
 * @property ToursDepartureTimes[] $toursDepartureTimes
 * @property Tours[] $tours
 */
class DepartureTimes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departure_times';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departure_time'], 'required'],
            [['departure_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departure_time' => 'Departure Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToursDepartureTimes()
    {
        return $this->hasMany(ToursDepartureTimes::className(), ['departure_time_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTours()
    {
        return $this->hasMany(Tours::className(), ['id' => 'tour_id'])->viaTable('tours_departure_times', ['departure_time_id' => 'id']);
    }
}

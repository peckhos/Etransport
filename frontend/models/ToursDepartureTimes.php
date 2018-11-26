<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tours_departure_times".
 *
 * @property int $tour_id
 * @property int $departure_time_id
 *
 * @property Tours $tour
 * @property DepartureTimes $departureTime
 */
class ToursDepartureTimes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tours_departure_times';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tour_id', 'departure_time_id'], 'required'],
            [['tour_id', 'departure_time_id'], 'integer'],
            [['tour_id', 'departure_time_id'], 'unique', 'targetAttribute' => ['tour_id', 'departure_time_id']],
            [['tour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tours::className(), 'targetAttribute' => ['tour_id' => 'id']],
            [['departure_time_id'], 'exist', 'skipOnError' => true, 'targetClass' => DepartureTimes::className(), 'targetAttribute' => ['departure_time_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tour_id' => 'Tour ID',
            'departure_time_id' => 'Departure Time ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTour()
    {
        return $this->hasOne(Tours::className(), ['id' => 'tour_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartureTime()
    {
        return $this->hasOne(DepartureTimes::className(), ['id' => 'departure_time_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tours".
 *
 * @property string $tour_name
 * @property int $max_on_tour
 * @property string $tour_duration
 * @property int $id
 *
 * @property ToursDepartureTimes[] $toursDepartureTimes
 * @property DepartureTimes[] $departureTimes
 */
class Tours extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tours';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tour_name', 'max_on_tour', 'tour_duration'], 'required'],
            [['tour_name'], 'string'],
            [['max_on_tour'], 'integer'],
            [['tour_duration'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tour_name' => 'Tour Name',
            'max_on_tour' => 'Max On Tour',
            'tour_duration' => 'Tour Duration',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToursDepartureTimes()
    {
        return $this->hasMany(ToursDepartureTimes::className(), ['tour_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartureTimes()
    {
        return $this->hasMany(DepartureTimes::className(), ['id' => 'departure_time_id'])->viaTable('tours_departure_times', ['tour_id' => 'id']);
    }
}

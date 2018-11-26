<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property int $id
 * @property int $res_num
 * @property int $tour_id
 * @property int $num_of_ppl
 * @property int $price
 * @property int $toursupplier_id
 * @property int $guest_id
 * @property string $created
 * @property string $dos
 * @property int $buses_required
 * @property string $comments
 *
 * @property TourSupplier $toursupplier
 * @property Guests $guest
 * @property Tours $tour
 * @property ReservationsVehicles[] $reservationsVehicles
 * @property Drivers[] $drivers
 * @property Vehicles[] $vehicles
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['res_num', 'tour_id', 'num_of_ppl', 'price', 'toursupplier_id', 'guest_id', 'created', 'dos', 'buses_required', 'comments'], 'required'],
            [['res_num', 'tour_id', 'num_of_ppl', 'price', 'toursupplier_id', 'guest_id', 'buses_required'], 'integer'],
            [['created', 'dos'], 'safe'],
            [['comments'], 'string', 'max' => 150],
            [['toursupplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => TourSupplier::className(), 'targetAttribute' => ['toursupplier_id' => 'id']],
            [['guest_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guests::className(), 'targetAttribute' => ['guest_id' => 'id']],
            [['tour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tours::className(), 'targetAttribute' => ['tour_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'res_num' => 'Reservantion Number',
            'tour_id' => 'Tour ',
            'num_of_ppl' => 'Number Of Guest',
            'price' => 'Price',
            'toursupplier_id' => 'Tour Supplier',
            'guest_id' => 'Guest Name',
            'created' => 'Created Date',
            'dos' => 'Date of Service',
            'buses_required' => 'Buses Required',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToursupplier()
    {
        return $this->hasOne(TourSupplier::className(), ['id' => 'toursupplier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuest()
    {
        return $this->hasOne(Guests::className(), ['id' => 'guest_id']);
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
    public function getReservationsVehicles()
    {
        return $this->hasMany(ReservationsVehicles::className(), ['reservation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(Drivers::className(), ['id' => 'driver_id'])->viaTable('reservations_vehicles', ['reservation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicles::className(), ['id' => 'vehicle_id'])->viaTable('reservations_vehicles', ['reservation_id' => 'id']);
    }
}

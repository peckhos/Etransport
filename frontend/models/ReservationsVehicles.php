<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservations_vehicles".
 *
 * @property int $reservation_id
 * @property int $vehicle_id
 * @property int $driver_id
 * @property int $id
 *
 * @property Drivers $driver
 * @property Reservation $reservation
 * @property Vehicles $vehicle
 */
class ReservationsVehicles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservations_vehicles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reservation_id', 'vehicle_id', 'driver_id'], 'required'],
            [['reservation_id', 'vehicle_id', 'driver_id'], 'integer'],
            [['reservation_id', 'vehicle_id'], 'unique', 'targetAttribute' => ['reservation_id', 'vehicle_id']],
            [['reservation_id', 'driver_id'], 'unique', 'targetAttribute' => ['reservation_id', 'driver_id']],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drivers::className(), 'targetAttribute' => ['driver_id' => 'id']],
            [['reservation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reservation::className(), 'targetAttribute' => ['reservation_id' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reservation_id' => 'Reservation ID',
            'vehicle_id' => 'Vehicle ID',
            'driver_id' => 'Driver ID',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Drivers::className(), ['id' => 'driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservation()
    {
        return $this->hasOne(Reservation::className(), ['id' => 'reservation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicles::className(), ['id' => 'vehicle_id']);
    }
}

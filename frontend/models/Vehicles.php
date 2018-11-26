<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicles".
 *
 * @property int $id
 * @property int $registration_num
 * @property int $make
 * @property int $model
 * @property int $Year
 * @property int $Mileage
 * @property int $Last_date_serviced
 * @property int $Last_tire_change
 * @property int $insurance_date
 * @property int $carrying_capacity
 *
 * @property ReservationsVehicles[] $reservationsVehicles
 * @property Reservation[] $reservations
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registration_num', 'make', 'model', 'Year', 'Mileage', 'Last_date_serviced', 'Last_tire_change', 'insurance_date', 'carrying_capacity'], 'required'],
            [['registration_num', 'make', 'model', 'Year', 'Mileage', 'Last_date_serviced', 'Last_tire_change', 'insurance_date', 'carrying_capacity'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_num' => 'Registration Num',
            'make' => 'Make',
            'model' => 'Model',
            'Year' => 'Year',
            'Mileage' => 'Mileage',
            'Last_date_serviced' => 'Last Date Serviced',
            'Last_tire_change' => 'Last Tire Change',
            'insurance_date' => 'Insurance Date',
            'carrying_capacity' => 'Carrying Capacity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservationsVehicles()
    {
        return $this->hasMany(ReservationsVehicles::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['id' => 'reservation_id'])->viaTable('reservations_vehicles', ['vehicle_id' => 'id']);
    }
}

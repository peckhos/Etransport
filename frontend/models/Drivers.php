<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drivers".
 *
 * @property int $id
 * @property int $driver_name
 * @property int $dob
 * @property int $license_num
 * @property int $issue_date
 * @property int $expiry_date
 * @property int $endorsement
 * @property int $address
 * @property int $mobile
 * @property int $landline
 *
 * @property ReservationsVehicles[] $reservationsVehicles
 * @property Reservation[] $reservations
 */
class Drivers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drivers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['driver_name', 'dob', 'license_num', 'issue_date', 'expiry_date', 'endorsement', 'address', 'mobile', 'landline'], 'required'],
            [['driver_name', 'dob', 'license_num', 'issue_date', 'expiry_date', 'endorsement', 'address', 'mobile', 'landline'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'driver_name' => 'Driver Name',
            'dob' => 'Dob',
            'license_num' => 'License Num',
            'issue_date' => 'Issue Date',
            'expiry_date' => 'Expiry Date',
            'endorsement' => 'Endorsement',
            'address' => 'Address',
            'mobile' => 'Mobile',
            'landline' => 'Landline',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservationsVehicles()
    {
        return $this->hasMany(ReservationsVehicles::className(), ['driver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['id' => 'reservation_id'])->viaTable('reservations_vehicles', ['driver_id' => 'id']);
    }
}

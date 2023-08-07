<?php

namespace app\models;

use yii\db\ActiveRecord;

class ContactProfile extends ActiveRecord
{
    public static function tableName()
    {
        return 'contact_profiles';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 255],
        ];
    }
}


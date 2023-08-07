<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\ContactProfile;

class ContactProfileController extends Controller
{
    public function actionIndex()
    {
        $contactProfiles = ContactProfile::find()->all();

        return $contactProfiles;
    }

    public function actionView($id)
    {
        $contactProfile = ContactProfile::findOne($id);

        return $contactProfile;
    }

    public function actionCreate()
    {
        $contactProfile = new ContactProfile();

        $contactProfile->name = Yii::$app->request->post('name');
        $contactProfile->email = Yii::$app->request->post('email');
        $contactProfile->phone = Yii::$app->request->post('phone');
        $contactProfile->address = Yii::$app->request->post('address');

        if ($contactProfile->save()) {
            return $contactProfile;
        } else {
            return $contactProfile->errors;
        }
    }

    public function actionUpdate($id)
    {
        $contactProfile = ContactProfile::findOne($id);

        $contactProfile->name = Yii::$app->request->post('name');
        $contactProfile->email = Yii::$app->request->post('email');
        $contactProfile->phone = Yii::$app->request->post('phone');
        $contactProfile->address = Yii::$app->request->post('address');

        if ($contactProfile->save()) {
            return $contactProfile;
        } else {
            return $contactProfile->errors;
        }
    }

    public function actionDelete($id)
    {
        $contactProfile = ContactProfile::findOne($id);

        $contactProfile->delete();

        return 'Contact profile deleted successfully.';
    }

    public function actionGet($id)
    {
        $contactProfile = ContactProfile::findOne($id);

        return [
            'id' => $contactProfile->id,
            'name' => $contactProfile->name,
            'email' => $contactProfile->email,
            'phone' => $contactProfile->phone,
            'address' => $contactProfile->address,
        ];
    }
}

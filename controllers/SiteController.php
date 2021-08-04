<?php

namespace app\controllers;

use app\models\Messages;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $messages = Messages::find()->orderBy(['created_at' => SORT_DESC])->limit(20)->all();
        return $this->render('index', compact('messages'));
    }
}

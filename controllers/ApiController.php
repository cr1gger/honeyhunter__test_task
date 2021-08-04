<?php


namespace app\controllers;


use app\models\Messages;
use Yii;
use yii\helpers\Html;
use yii\validators\EmailValidator;
use yii\web\Controller;

class ApiController extends Controller
{
    private function result(bool $status, string $message, ...$fields)
    {
        return $this->asJson([
            'status' => $status,
            'message' => $message,
            'addons' => $fields
        ]);
    }
    public function actionMessages()
    {
        if (Yii::$app->request->isPost)
        {
            $data = Yii::$app->request->post();

            if (empty($data['name'])) return $this->result(false, 'Имя не может быть пустым');
            if (empty($data['email'])) return $this->result(false, 'Email не может быть пустым');
            if (empty($data['message'])) return $this->result(false, 'Сообщение не может быть пустым');

            $validator = new EmailValidator();
            if (!$validator->validate($data['email'])) return $this->result(false, 'Проверьте правильность введеной почты');

            $messagesModel = new Messages();
            $messagesModel->name = Html::encode($data['name']);
            $messagesModel->email = Html::encode($data['email']);
            $messagesModel->message = Html::encode($data['message']);
            if($messagesModel->save())
            {
                return $this->result(true,'Сообщение оставлено =)', [
                    'message' => [
                        'name' => $messagesModel->name,
                        'email' => $messagesModel->email,
                        'message' => $messagesModel->message,
                    ]
                ]);
            } else {
                return $this->result(false, 'Не удалось сохранить ваше сообщение, у нас проблемы =(');
            }
        }
    }
}
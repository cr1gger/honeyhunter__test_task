<?php
namespace app\widgets;


class Comment extends \yii\base\Widget
{
    public $name;
    public $email;
    public $message;
    public function run()
    {
        return $this->render('comment', [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
    }
}
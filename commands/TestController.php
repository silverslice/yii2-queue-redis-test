<?php

namespace app\commands;

use app\models\jobs\TestJob;
use yii\console\Controller;
use yii\console\ExitCode;

class TestController extends Controller
{
    /**
     * Sends n test messages.
     * @param $count
     * @return int
     */
    public function actionSend($count = 1)
    {
        for ($i = 0; $i < $count; $i++) {
            \Yii::$app->queue->push(new TestJob([
                'message' => 'test message ' . $i,
            ]));
        }

        echo "$count messages sent\n";

        $time = explode(' ', microtime());
        echo date('Y-m-d H:i:s') . ' ' . $time[0] . "\n";

        return ExitCode::OK;
    }
}

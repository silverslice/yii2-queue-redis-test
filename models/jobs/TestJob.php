<?php

namespace app\models\jobs;

use yii\base\BaseObject;

/**
 * Saves message in runtime/message directory.
 * The file is named according to the current time with microseconds.
 */
class TestJob extends BaseObject implements \yii\queue\JobInterface
{
    public $message;

    public function execute($queue)
    {
        $this->realSleep(2);

        $dir = __DIR__ . '/../../runtime/message/';
        if (!is_dir($dir)) {
            mkdir($dir);
        }

        $time = explode(' ', microtime());
        $filename = date('Y-m-d H:i:s') . ' ' . $time[0] . '_' . uniqid() . '.txt';
        file_put_contents($dir . $filename, $this->message);
    }

    protected function realSleep(int $seconds): bool
    {
        $period = ['seconds' => $seconds, 'nanoseconds' => 0];

        while (array_sum($period) > 0) {
            $period = time_nanosleep($period['seconds'], $period['nanoseconds']);

            if (is_bool($period)) {
                return $period;
            }
        }

        return true;
    }
}

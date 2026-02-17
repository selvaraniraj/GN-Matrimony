<?php

namespace App\Exceptions\Support;

use App\Core\Models\ErrorCodes;
use App\Core\Utils\CacheKeys;
use App\Exceptions\DefinedFault;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Cache;

class ErrorCodeHandler
{
    private int $errCount;

    private int $maxLimit;

    /**
     * @var mixed
     */
    private string $code;

    private string $key;

    private array $errCodesList;

    private string $errCodesKey;

    public function __construct($code)
    {
        $this->code = $code;
        $this->key = CacheKeys::ERROR_CODE_BBPS_PREFIX . $this->code;
        $this->errCodesKey = CacheKeys::AVAILABLE_ERROR_CODE_LIST_BBPS;
    }

    /**
     * @throws DefinedFault
     */
    public function get()
    {
        $this->validating();
        if ($this->errCount >= $this->maxLimit) {
            $this->sendMailIfCntExceeds();
        }
    }

    protected function validating()
    {
        Cache::put($this->key, Cache::get($this->key) + 1, 3600);
        $this->errCount = (int) Cache::get($this->key);

        if (! Cache::has($this->errCodesKey)) {
            $list = ErrorCodes::where('code', $this->code)->first()->toArray();
            Cache::put($this->errCodesKey, $list, 3600);
        }

        $this->errCodesList = Cache::get($this->errCodesKey);
        $this->maxLimit = (int) $this->errCodesList['max_limit'];
    }

    /**
     * @throws DefinedFault
     */
    private function sendMailIfCntExceeds()
    {
        $sendEmail = (int) $this->errCodesList['notify'] ??= 0;
        if (isDead($sendEmail) || $sendEmail === 0) {
            return;
        }

        $data = [];
        $data['code'] = $this->code;
        $data['max_limit'] = $this->errCount;
        $data['desc'] = $this->errCodesList['desc'] ?? '';
        $this->initiateEmail($data);
    }

    /**
     * @throws DefinedFault
     */
    private function initiateEmail($data)
    {
        $job = new SendEmail(
            settings('mail_mongo_data_alert_to'),
            "Alert : BBPS Error Code Exception({$this->code})",
            'emails.errorCodeInfo',
            $data
        );

        if (settings('TriggerQueueOnTheFly') == 1) {
            $job->handle();
            return;
        }
        dispatch($job);
    }
}

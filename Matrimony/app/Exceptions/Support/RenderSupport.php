<?php

namespace App\Exceptions\Support;

use Illuminate\Http\JsonResponse;

trait RenderSupport
{
    use OutLander;

    public function render(): JsonResponse
    {
        $out = $this->getDecodedMessage();
        $message = $out['message'] ??= '';
        $data = $out['data'] ??= [];
        unset($out['message']);
        unset($out['data']);
        return $this->buildOutLander($message, $data);
    }

    public function getDecodedMessage()
    {
        return json_decode($this->getMessage(), true);
    }
}

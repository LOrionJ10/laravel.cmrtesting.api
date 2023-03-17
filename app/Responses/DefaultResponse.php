<?php

namespace App\Responses;

use JsonSerializable;

class DefaultResponse implements JsonSerializable {
    private $error, $msg, $payload;

    function __construct($msg = "", $error = true, $payload = null)
    {
        $this->msg = $msg;
        $this->error = $error;
        $this->payload = $payload;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
<?php

namespace App\Exceptions;

use Exception;

class ItemNotFound extends Exception
{
    public function __construct($item, $id)
    {
        $message = "{$item} with ID {$id} not found.";
        parent::__construct($message);
    }
}

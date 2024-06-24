<?php

namespace App\Services;

use App\Models\LoginLog;
use Illuminate\Support\Facades\Request;

class LoginLogService
{
    public function logLogin($userId)
    {
        LoginLog::create([
            'user_id' => $userId,
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
        ]);
    }
}


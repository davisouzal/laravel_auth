<?php

namespace App\Models;

use App\Services\LoggerService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
    ];

    protected static function booted()
    {
        static::created(function ($model) {
            app(LoggerService::class)->logStore($model, auth()->user());
        });

        static::updated(function ($model) {
            app(LoggerService::class)->logUpdate($model, auth()->user());
        });

        static::deleted(function ($model) {
            app(LoggerService::class)->logDestroy($model, auth()->user());
        });
    }
}

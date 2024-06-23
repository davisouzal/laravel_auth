<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Log;

class LoggerService
{
    public function logStore($model, $user)
    {
            DB::transaction(function () use ($model, $user) {
                $log = new Log([
                    'idUser' => $user->id,
                    'action' => 'store',
                    'tableName' => (new \ReflectionClass($model))->getShortName(),
                    'columnName' => json_encode(array_keys($model->getAttributes())),
                    'newValue' => json_encode($model->toArray()),
                    'idRecord' => $model->id,
                ]);
                $log->save();
            });

    }
    public function logUpdate($model, $user)
    {
        DB::transaction(function () use ($model, $user) {
            $log = new Log([
                'idUser' => $user->id,
                'action' => 'update',
                'tableName' => (new \ReflectionClass($model))->getShortName(),
                'columnName' => json_encode(array_keys($model->getAttributes())),
                'oldValue' => json_encode($model->getOriginal()),
                'newValue' => json_encode($model->toArray()),
                'idRecord' => $model->id,
            ]);
            $log->save();
        });
    }

    public function logDestroy($model, $user)
    {
        DB::transaction(function () use ($model, $user) {
            $log = new Log([
                'idUser' => $user->id,
                'action' => 'destroy',
                'tableName' => (new \ReflectionClass($model))->getShortName(),
                'columnName' => json_encode(array_keys($model->getAttributes())),
                'oldValue' => json_encode($model->toArray()),
                'idRecord' => $model->id,
            ]);
            $log->save();
        });
    }

    // Implement similar methods for update and destroy actions
}

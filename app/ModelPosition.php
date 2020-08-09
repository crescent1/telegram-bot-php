<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPosition extends Model
{
    /**
     * tabel yang akan digunakan oleh model
     *
     * @var string
     */
    protected $table = 'message_position';

    protected $fillable = [
        'chat_id',
        'posisi'
    ];

}

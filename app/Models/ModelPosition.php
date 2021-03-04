<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ModelPosition
 *
 * @property int $id
 * @property string|null $chat_id
 * @property string|null $posisi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition wherePosisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ModelPosition extends Model
{
    /**
     * tabel yang akan digunakan oleh model
     *
     * @var string
     */
    protected $table = 'message_position';

    /**
     * set data yang boleh di isi kedalam database
     *
     * @var array
     */
    protected $fillable = [
        'chat_id',
        'posisi'
    ];

}

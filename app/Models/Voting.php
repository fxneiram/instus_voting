<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Voting
 * @package App\Models
 * @version October 24, 2021, 9:07 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property string|\Carbon\Carbon $begin_at
 * @property string|\Carbon\Carbon $end_at
 */
class Voting extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'votings';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'begin_at',
        'end_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'begin_at' => 'datetime',
        'end_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:125',
        'description' => 'required|string',
        'begin_at' => 'required',
        'end_at' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

}

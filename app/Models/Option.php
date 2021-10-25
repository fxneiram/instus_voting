<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Option
 * @package App\Models
 * @version October 24, 2021, 9:07 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property string|\Carbon\Carbon $begin_at
 * @property string|\Carbon\Carbon $end_at
 */
class Option extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'options';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'voting_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required|string'
    ];


}

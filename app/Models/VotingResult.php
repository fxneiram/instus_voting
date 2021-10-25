<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingResult extends Model
{
    use HasFactory;

    public $table = 'voting_result';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'voting_id',
        'option_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'voting_id' => 'integer',
        'option_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'voting_id' => 'required',
        'option_id' => 'required',
    ];

    public static $messages = [
        'voting_id.required' => 'El id de la votación es obligatorio',

        'option_id.required' => 'La opción es obligatoria',

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVoting extends Model
{
    use HasFactory;


    public $table = 'user_voting';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'voting_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'voting_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'voting_id' => 'required',
        'user_id' => 'required|unique:user_voting,user_id,NULL,id,voting_id',
    ];

    public static $messages = [
        'voting_id.required' => 'El id de la votación es obligatorio',

        'user_id.required' => 'El usuario es obligatorio',
        'user_id.unique' => 'El usuario ya partició en esta votación',

    ];
}

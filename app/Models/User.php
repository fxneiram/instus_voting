<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'email' => 'required|string|max:191',
        'password' => 'nullable|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $messages = [
        'name.required' => 'El nombre es obligatorio',
        'name.max' => 'El nombre es demasiado largo',

        'email.required' => 'El correo es obligatorio',
        'email.max' => 'El correo es demasiado largo',
        'email.email' => 'El correo no tiene un formato válido',
        'email.unique' => 'El correo ya se encuentra en uso',

        'password.required' => 'La contraseña es obligatoria',
        'password.max' => 'La contraseña  es demasiado larga',
        'password.min' => 'La contraseña  es demasiado corta'
    ];
}

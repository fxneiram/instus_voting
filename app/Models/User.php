<?php

namespace App\Models;

use App\Exceptions\VotingException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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

    public function vote($data)
    {

        $voting_id = $data['voting_id'];
        $option_id = $data['option_id'];
        $user_id = $data['user_id'];

        DB::beginTransaction();

        try {
            DB::insert('insert into user_voting (user_id, voting_id) values( ?, ? )',
                [$user_id, $voting_id]
            );

            DB::insert('update voting_result set total = (voting_result.total + 1) WHERE voting_id = ? AND option_id = ?',
                [$voting_id, $option_id]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            throw new VotingException();
            //return false;
        }

        return true;
    }
}

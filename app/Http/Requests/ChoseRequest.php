<?php


namespace App\Http\Requests;


use App\Models\UserVoting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChoseRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = UserVoting::$rules;

        $this->merge(['user_id' => Auth::id() . '']);

        $rules['user_id'] = $rules['user_id'] . ',' . $this->voting_id;
        $rules['option_id'] = 'required';

        return $rules;
    }

    public function messages()
    {
        return UserVoting::$messages;
    }
}

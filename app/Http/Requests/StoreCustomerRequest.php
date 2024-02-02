<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    /**
     *
	    $table->string('name');
	    $table->string('type');
	    $table->string('email');
	    $table->string('address');
	    $table->string('city');
	    $table->string('state');
	    $table->string('postal_code');
     *
     *
     */
    public function rules(): array
    {
        return [
		'name' => ['required'],
		'type' => ['required', Rule::in(['I', 'B', 'i', 'b'])],
		'email' => ['required','email'],
		'address' => ['required'],
		'city' => ['required'],
		'state' => ['required'],
		'postalCode' => ['required'],

        ];
    }

    /**
     * Allow to merge other values such as postal_code.gt
     */
    protected function prepareForValidation(){
	    $this->merge([
		    'postal_code' => $this->postalCode
	    ]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ValidationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:50'], //Oleksandr
            'last_name' => ['nullable', 'string', 'min:3', 'max:50'], // Solyn
            'age' => ['nullable', 'integer', 'min:18', 'max:100'], // 25
            'amount' => ['required', 'numeric', 'min:1', 'max:9999999'], // 125.45 /125
            'gender' => ['nullable', 'string', 'in:male,female'], // Solyn
            'zip' => ['required', 'digits:6'], // 123456
            'subscription' => ['nullable', 'boolean'], //true/false/1/0
            'agrement' => ['accepted'], // true/1/yes
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), 'confirmed'], // passwword_confirmation
            'current_password' => ['required', 'string', '  current_password'], // current_password
            'email' => ['required', 'string', 'email', 'exists:users,email'], // mail@example.com'
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'country_id' => ['required', 'integer', Rule::exists('countries', 'id')->where('active', true)],
            'phone' => ['required', 'string', 'unique:user,phone'],
            // 'phone' => ['required', 'string', new Phone, Rule::unique('users', 'phone')->ignore($user)],

            'website' => ['nullable', 'string', 'url'],  // https://example.com
            'uuid' => ['nullable', 'string', 'uuid'], //sadsa-asdas-erwqwe-vmcxp
            'ip' => ['nullable', 'string', 'ip'], // 127.0.0.1
            'avatar' => ['required', 'file', 'image', 'max:1024'], //1Mb
            'birth_date' => ['nullable', 'string', 'date'], // 2021-10-09/09-10-2021 12:30:00
            'start_date' => ['required', 'string', 'data', 'after_or_equal:today'], // 2021-10-09/09-10-2021 12:30:00
            'finish_date' => ['required', 'string', 'data', 'after:today'], // 2021-10-09/09-10-2021 12:30:00
            'services' => ['nullable', 'array', 'min:1', 'max:10'],
            'services.*' => ['required', 'integer'], // [1,2,3,4,5]
            'delivery' => ['required', 'array', 'size:2'], // ['date' => '2021-10-09', 'time' => '12:30:00']
            'delivery.data' => ['required', 'string', 'date_format:Y.m.d'], // 2021-10-09
            'delivery.time' => ['required', 'string', 'date_format:H.i.s'], // 12:30:00
            'secret' => ['required', 'string', function ($attribute, $value, \Closure $fail) {
                if ($value !== config('example.secret')) {
                    $fail(__('Неверный секретный ключ.'));
                }
            }],

        ]);
    }
}

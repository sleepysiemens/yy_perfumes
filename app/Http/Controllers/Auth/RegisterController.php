<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Dadata\DadataClient;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User|\Illuminate\Http\RedirectResponse
     */
    protected function create(array $data)
    {
        if ($data['user_type'] == 'dealer') {
            $dadata = new DadataClient(env('DADATA_API'), env('DADATA_SECRET'));
            $result = $dadata->findById("party", $data['inn']);

            if (isset($result[0])) {
                $result = $result[0];

                $requisites = [
                    'soc_name' => $result['value'],
                    'inn' => $result['data']['inn'],
                    'name' => $result['data']['name']['full_with_opf'],
                    'address' => $result['data']['address']['unrestricted_value'],
                    'okpo' => $result['data']['okpo'],
                    'ogrn' => $result['data']['ogrn'],
                ];
            } else {
                exit('Организация по ИНН не найдена.');
            }
        } else {
            $requisites = [];
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['user_type'],
            'requisites' => $requisites,
        ]);
    }
}

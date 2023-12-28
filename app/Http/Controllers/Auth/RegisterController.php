<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
            'alamat' => ['required', 'max:45'],
            'no_tlp' => ['required', 'max:13'],
            'tgl_bergabung' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $fileName = $file->getClientOriginalName(); // Memberikan nama unik untuk file
        //     $file->move(public_path('storage/fotos/'), $fileName); 
        // } else {
        //     $fileName = null; // Atau beri nilai default jika tidak ada file yang diunggah
        // }

        if ($data->hasFile('foto')) { // Perubahan dari $request menjadi $data
            $file = $data->file('foto'); // Perubahan dari $request menjadi $data
            $fileName = $file->getClientOriginalName(); // Memberikan nama unik untuk file
            $file->move(public_path('storage/fotos/'), $fileName); 
        } else {
            $fileName = null; // Atau beri nilai default jika tidak ada file yang diunggah
        }

        return User::create([
            'name' => $data['name'],
            'alamat' => $data['alamat'],
            'no_tlp' => $data['no_tlp'],
            'tgl_bergabung' => $data['tgl_bergabung'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'foto' => $fileName,
        ]);
    }
}
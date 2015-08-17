<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * @var string
	 */
	protected $redirectPath = '/';

	/**
	 * @var string
	 */
	protected $loginPath = '/login';

	/**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
	        'phone' => 'size:12',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);

	    $this->makeAdminIfFirst($user);

	    return $user;
    }

	/**
	 * @param User $user
	 */
	protected function makeAdminIfFirst(User $user)
	{
		if (User::count() == 1){ // if first user
			$user->is_admin =  true;
			$user->save();
		}
	}

	/**
	 * Redirect the user to the authentication page.
	 *
	 * @return Response
	 */
	public function redirectToProvider($driver)
	{
		return Socialite::driver($driver)->redirect();
	}

	/**
	 * Obtain the user information.
	 *
	 * @return Response
	 */
	public function handleProviderCallback(Request $request, $driver)
	{
		/**
		 * @var \Laravel\Socialite\Contracts\User $providerUser
		 */
		$providerUser = Socialite::driver($driver)->user();
		$validator = Validator::make([
			'email' => $providerUser->getEmail(),
			'name' => $providerUser->getName(),
		],[
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
		]);
		if ($validator->fails()) {
			$this->throwValidationException($request, $validator);
		}
		$userById = User::all()->where('provider', $driver)
			->where('provider_user_id', $providerUser->getId())->first();
		$userByEmail = User::all()->where('email', $providerUser->getEmail())->first();

		if ($userById){
			$user = $userById;
		} elseif ($userByEmail) {
			$user = $userByEmail;
		} else {
			$user = User::create([
				'name' => $providerUser->getName(),
				'email' => $providerUser->getEmail(),
				'provider' => $driver,
				'provider_user_id' => $providerUser->getId(),
				'image' => $providerUser->getAvatar(),
			]);
		}

		$this->makeAdminIfFirst($user);
		Auth::login($user);

		return redirect($this->redirectPath());
	}
}

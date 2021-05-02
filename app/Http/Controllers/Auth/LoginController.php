<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
      
    }



    public function showShopLoginForm()
    {
        return view('auth.login', ['url' => 'shop']);
    }



    public function shopLogin(Request $request)
    {
        
        if (Auth::guard('shop')->attempt(['shopUserName' => $request->adminAccessId, 'password' => $request->password], $request->get('remember'))) 
        {

            return redirect()->intended(('/shop'));
         
        }
        return back()->withInput($request->only('adminAccessId', 'remember'));
    }



    // User Id
    public function login(Request $request)
   {
        $input = $request->all();


       //if (isset($request->adminAccessId)) {
           $this->validate($request, [
               'adminAccessId' => 'required',
               'password' => 'required',
           ]);

           $adminAccessId = filter_var($request->adminAccessId, FILTER_VALIDATE_EMAIL) ? 'email' : 'adminAccessId';
           if(auth()->attempt(array($adminAccessId => $input['adminAccessId'], 'password' => $input['password'])))
           {
               return redirect()->route('home');
           }
           else{
               return redirect()->route('login')->with('error','Something is Wrong');
           }
    //    }
    //    else {
    //        $this->validate($request, [
    //            'shopAccessName' => 'required',
    //            'password' => 'required',
    //        ]);

    //         $shopAccessName = filter_var($request->shopAccessName, FILTER_VALIDATE_EMAIL) ? 'email' : 'shopAccessName';
            
    //         if(auth()->attempt(array($shopAccessName => $input['shopAccessName'], 'password' => $input['password'])))
    //         // $shopInformation = shopInformation::where('shopUserName',$request->shopAccessName)->where('pass',$request->password)->first();
    //         // if($shopInformation)
    //         {
    //             return redirect()->route('home');
    //         }

    //         else{
    //             return redirect('/shop/login')->with('error','Something is Wrong');
    //         }
    //     }
     }
}

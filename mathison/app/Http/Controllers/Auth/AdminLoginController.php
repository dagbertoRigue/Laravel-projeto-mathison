<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller {

  public function __construct() {
		$this->middleware('guest:admin', ['except' =>['logout']]);
	}

  public function showLoginForm() {
    return view('auth.admin-login');
  }

  public function login(Request $request) {
    //validar os dados do formulário
    $this->validate($request, [
      'email' =>'required|email',
      'password' => 'required|min:6'
    ]);

    //Testar o login do usuário
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      //se bem sucedido, então redirecionar para o local pretendido
      return redirect()->intended(route('admin.dashboard'));
    }
    //senão, redirecionar de volta para a tela de login
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  public function logout() {
    Auth::guard('admin')->logout();
    return redirect()->route('mathison.home');
  }
}

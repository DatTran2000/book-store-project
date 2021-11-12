<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LineService;

class LoginController extends Controller
{
 /** @var  LineService */
 protected $lineService;

 /**
  * LoginController constructor.
  * @param LineService $lineService
  */
 public function __construct(LineService $lineService)
 {
     $this->lineService = $lineService;
 }

 /**
  * Login Blade
  * @param Request $request;
  * @return View
  */
 public function index(Request $request) {
     $authUrl = $this->lineService->getLoginBaseUrl();
     return view('loginline', compact('authUrl'));
 }

 public function handleLineCallback(Request $request) {
     $code = $request->input('code', '');
     $response = $this->lineService->getLineToken($code);
     // Get profile from access token.
     $profile = $this->lineService->getLineToken($response['access_token']);
     // Get profile from ID token
     $profile = $this->lineService->verifyIDToken($response['id_token']);
 }
}

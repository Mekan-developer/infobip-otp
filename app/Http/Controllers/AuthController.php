<?php

namespace App\Http\Controllers;


use App\Services\OTPService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string', // Validate the phone number
        ]);

        $otp = "Hangeldi gowmy tanadynmy"; // Generate a random OTP
        $response = $this->otpService->sendOTP($request->phone_number, $otp);

        return response()->json($response);
    }
}


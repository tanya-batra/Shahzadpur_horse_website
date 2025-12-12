<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

  public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'logo' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('logo')) {
       
        if ($user->logo && file_exists(public_path('admin_logos/' . $user->logo))) {
            unlink(public_path('admin_logos/' . $user->logo));
        }


        $file = $request->file('logo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('admin_logos'), $filename);

        $user->logo = $filename;
    }

    $user->name = $request->name;
    $user->save();

    return back()->with('success', 'Profile updated successfully.');
}


    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Password updated. Please login again.');
    }

    public function requestEmailChange(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $otp = rand(100000, 999999);

        EmailOtp::create([
            'user_id'    => $user->id,
            'new_email'  => $request->email,
            'otp'        => $otp,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        Mail::raw("Your OTP for email verification is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Email Verification OTP');
        });

        return back()->with('success', 'OTP sent to your new email. Please verify.');
    }

    public function verifyEmailOtp(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $otpRecord = EmailOtp::where('user_id', $user->id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if (!$otpRecord) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        $user->email = $otpRecord->new_email;
        $user->save();

        $otpRecord->delete();

        return back()->with('success', 'Email updated successfully.');
    }
}

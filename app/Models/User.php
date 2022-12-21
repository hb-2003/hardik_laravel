<?php

namespace App\Models;

use App\Mail\EmailVerification;
use App\Mail\PasswordReset;
use File;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = ['first_name', 'last_name', 'gender', 'dob', 'email','telephone', 'role', 'status', 'password'];
    protected $hidden = ['password', ];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function sendEmailVerificationNotification()
    {
         Mail::to($this->email)->send(new EmailVerification($this));
    }

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->send(new PasswordReset($this, $token));
    }
}

<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log; // ADD THIS LINE

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // DEBUGGING: Log the credentials being attempted
        Log::info('Login attempt for username: ' . $this->input('username') . ' from IP: ' . $this->ip());
        Log::info('Remember me: ' . ($this->boolean('remember') ? 'true' : 'false'));

        // Attempt authentication
        $attempt = Auth::attempt(
            $this->only('username', 'password'),
            $this->boolean('remember')
        );

        // DEBUGGING: Log the result of Auth::attempt
        Log::info('Auth::attempt result: ' . ($attempt ? 'TRUE' : 'FALSE'));

        if (! $attempt) {
            RateLimiter::hit($this->throttleKey());

            // DEBUGGING: Log if authentication failed
            Log::warning('Authentication FAILED for username: ' . $this->input('username') . '. Trans message: ' . trans('auth.failed'));

            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        // DEBUGGING: Log if authentication succeeded
        Log::info('Authentication SUCCESSFUL for username: ' . $this->input('username'));
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('username')).'|'.$this->ip());
    }
}
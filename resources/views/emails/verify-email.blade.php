<p>Hello {{ $user->name }},</p>
<p>Please click the following link to verify your email:</p>

<a href="{{ route('user.verify.email', ['token' => $user->remember_token]) }}">Verify Email</a>

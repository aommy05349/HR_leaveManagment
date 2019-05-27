@component('mail::message')
# คุณลืมรหัสผ่านใช่หรือไม่ ??

<a href="{{ url('password/reset',$token) }}">Click here to reset password</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

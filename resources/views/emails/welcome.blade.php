@component('mail::message')
# Welcome PhanoLink

Chúc mừng bạn đã đăng kí thành công tài khoản tại PhanoLink ^.^

@component('mail::button', ['url' => 'http://localhost:8000/'])
Visit my web
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

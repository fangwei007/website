<h4>请打开下面链接重置您的密码：</h4><br>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> <strong>重置我的密码</strong></a>

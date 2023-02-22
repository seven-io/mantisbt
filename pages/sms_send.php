<?php
auth_ensure_user_authenticated();
form_security_validate('sms_send');

$f_bug_id = gpc_get_int('bug_id');
$cellphone = gpc_get_int('cellphone');
$text = gpc_get_string('text');

$ch = curl_init('https://gateway.seven.io/api/sms');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'text' => curl_escape($ch, $text),
    'to' => $cellphone,
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'Content-type: application/json',
    'X-Api-Key: ' . plugin_config_get('api_key'),
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

form_security_purge('sms_send');
layout_page_begin(string_get_bug_view_url($f_bug_id));

bugnote_add($f_bug_id,
    '<b>' . lang_get('plugin_Seven_sms_bugnote_sent') . $cellphone . ' </b><p>' . $text . '</p>');

print_header_redirect_view($f_bug_id);

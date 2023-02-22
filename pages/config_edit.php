<?php

# authenticate
auth_reauthenticate();
access_ensure_global_level(config_get('manage_plugin_threshold'));

# Read results
form_security_validate('plugin_Seven_config_update');

# update results
plugin_config_set('access_level', gpc_get_int('access_level'));
plugin_config_set('api_key', gpc_get_string('api_key'));
plugin_config_set('custom_field_id', gpc_get_int('custom_field_id'));
plugin_config_set('priority', gpc_get_bool('priority'));

form_security_purge('plugin_Seven_config_update');

# redirect
print_successful_redirect(plugin_page('config', true));

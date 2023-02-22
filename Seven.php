<?php /** @noinspection PhpUnused */

class SevenPlugin extends MantisPlugin {
    function register() {
        $this->author = 'seven communications GmbH & Co. KG';
        $this->contact = 'support@seven.io';
        $this->description = lang_get('plugin_Seven_description');
        $this->name = 'Seven';
        $this->page = 'config';
        $this->requires = ['MantisCore' => '2.0.0'];
        $this->url = 'https://www.seven.io';
        $this->version = '0.0.1';
    }

    function config(): array {
        return [
            'access_level' => DEVELOPER,
            'api_key' => '',
            'custom_field_id' => '',
            'priority' => ON,
        ];
    }

    function init() {
        plugin_event_hook('EVENT_MENU_ISSUE', 'seven_menu');
    }

    function seven_menu(): array {
        $bugId = gpc_get_int('id');

        if (!access_has_bug_level(plugin_config_get('access_level'), $bugId)) return [];

        return [lang_get('menu_Seven_link') => plugin_page('sms_send_page.php&bug_id=' . $bugId)];
    }
}


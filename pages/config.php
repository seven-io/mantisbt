<?php
auth_reauthenticate();
access_ensure_global_level(config_get('manage_plugin_access_level'));

layout_page_header(lang_get('plugin_Seven_configuration'));
layout_page_begin('manage_overview_page.php');

print_manage_menu();

$customFields = [];
foreach (custom_field_get_ids() as $id) {
    $def = custom_field_get_definition($id);
    $name = lang_get_defaulted($def['name']);
    $customFields[] = compact('id', 'name');
}
?>
    <div class='col-md-12 col-xs-12'>
        <div class='space-10'></div>

        <form action='<?= plugin_page('config_edit') ?>' method='post'>
            <?= form_security_field('plugin_Seven_config_update') ?>

            <div class='widget-box widget-color-blue2'>
                <div class='widget-header widget-header-small'>
                    <h4 class='widget-title lighter'>
                        <?php print_icon('fa-envelope', 'ace-icon'); ?>
                        <?= lang_get('plugin_Seven_configuration') ?>
                    </h4>
                </div>

                <div class='widget-body'>
                    <div class='widget-main no-padding'>
                        <div class='table-responsive'>
                            <table class='table table-bordered table-condensed table-striped'>
                                <tr>
                                    <th class='category width-40'>
                                        <label for='seven_access_level'>
                                            <?= lang_get('plugin_Seven_access_level') ?>
                                        </label>
                                        <p class='small'>
                                            <?= lang_get('plugin_Seven_access_level_description') ?>
                                        </p>
                                    </th>
                                    <td>
                                        <select
                                                class='width-100'
                                                id='seven_access_level'
                                                name='access_level'
                                        >
                                            <?php print_enum_string_option_list('access_levels', plugin_config_get('access_level')) ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class='category width-40'>
                                        <label for='seven_api_key'>
                                            <?= lang_get('plugin_Seven_api_key') ?>
                                        </label>
                                        <p class='small'>
                                            <?= lang_get('plugin_Seven_api_key_description') ?>
                                        </p>
                                    </th>
                                    <td>
                                        <input
                                                class='width-100'
                                                id='seven_api_key'
                                                maxlength='64'
                                                name='api_key'
                                                required
                                                value='<?= plugin_config_get('api_key') ?>'
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <th class='category width-40'>
                                        <label for='seven_custom_field_id'>
                                            <?= lang_get('plugin_Seven_custom_field_id') ?>
                                        </label>
                                        <p class='small'>
                                            <?= lang_get('plugin_Seven_custom_field_id_description') ?>
                                        </p>
                                    </th>
                                    <td>
                                        <select
                                                class='width-100'
                                                id='seven_custom_field_id'
                                                name='custom_field_id'
                                        >
                                            <option value=''></option>
                                            <?php foreach ($customFields as $customField): ?>
                                                <option
                                                        value='<?= $customField['id'] ?>'
                                                    <?php check_selected(plugin_config_get('custom_field_id'), $customField['id']) ?>
                                                >
                                                    <?= $customField['name'] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th class='category width-40'>
                                        <label for='seven_priority'>
                                            <?= lang_get('plugin_Seven_priority') ?>
                                        </label>
                                        <p class='small'>
                                            <?= lang_get('plugin_Seven_priority_description') ?>
                                        </p>
                                    </th>
                                    <td>
                                        <input
                                                class='input-sm'
                                                id='seven_priority'
                                                name='priority'
                                                type='checkbox'
                                            <?php check_checked((int)plugin_config_get('priority'), ON) ?>
                                        />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <p class='alert alert-warning'>
                        <?= lang_get('plugin_Seven_information') ?>
                    </p>
                </div>

                <div class='widget-toolbox padding-8 clearfix'>
                    <input
                            class='btn btn-primary btn-white btn-round'
                            type='submit'
                            value='<?= lang_get('change_configuration') ?>'
                    />
                </div>
            </div>
        </form>
    </div>
<?php
layout_page_end();

<?php
auth_ensure_user_authenticated();
require_once 'core.php';
require_once 'core/bug_api.php';
define('BUG_VIEW_INC_ALLOW', true);

layout_page_header(lang_get('menu_Seven_link'));
layout_page_begin();

$bug = bug_get(gpc_get_int('bug_id'), true);
$projectCellphone = project_get_field($bug->project_id, 'description');
?>
    <div class='col-md-12 col-xs-12'>
        <div class='space-10'></div>

        <div class='widget-box widget-color-blue2'>
            <h1><?= lang_get('menu_Seven_link') ?></h1>

            <form action='<?= plugin_page('sms_send.php') ?>' method='post'>
                <?= form_security_field('sms_send') ?>
                <input name='bug_id' value='<?= $bug->id ?>' type='hidden'/>

                <div class='widget-body'>
                    <div class='widget-main no-padding'>

                        <div class='table-responsive'>
                            <table class='table table-condensed'>
                                <tr>
                                    <th class='width-30'>
                                        <label for='cellphone'>
                                            <?= lang_get('plugin_Seven_to') ?>
                                        </label>
                                        <p class='small'>
                                            <?= lang_get('plugin_Seven_to_description') ?>
                                        </p>
                                    </th>

                                    <td>
                                        <input
                                                class='width-100'
                                                id='cellphone'
                                                name='cellphone'
                                                value='<?= plugin_config_get('priority') == 1
                                                && is_numeric($projectCellphone)
                                                    ? $projectCellphone
                                                    : custom_field_get_value(plugin_config_get('custom_field_id'), $bug->id) ?>'
                                        />
                                    </td>
                                </tr>

                                <tr>
                                    <th class='width-30'>
                                        <label for='text'>
                                            <?= lang_get('plugin_Seven_text') ?>
                                        </label>
                                        <p class='small'>
                                            <?= lang_get('plugin_Seven_text_description') ?>
                                        </p>
                                    </th>
                                    <td>
                                        <textarea
                                                autofocus
                                                class='width-100'
                                                id='text'
                                                maxlength='1520'
                                                name='text'
                                                required
                                                rows='5'
                                        ><?= lang_get('plugin_Seven_issue') . $bug->id . ' '
                                            . lang_get('plugin_Seven_attend_by')
                                            . user_get_name($bug->handler_id)
                                            . lang_get('plugin_Seven_message2') ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <input
                                class='btn btn-sm btn-primary'
                                type='submit'
                                value='<?= lang_get('bug_send_button') ?>'
                        />
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
layout_page_end();

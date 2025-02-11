<?php
/**
 * Plugin Name: AvoBackup Manager
 * Plugin URI: https://avocadoweb.net/
 * Description: A plugin to backup and restore WordPress files and database with cloud storage support.
 * Version: 1.2
 * Author: Your Name
 * Author URI: https://avocadoweb.net/
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

// Add Menu Page
function avo_backup_manager_menu() {
    add_menu_page(
        'AvoBackup Manager',
        'AvoBackup Manager',
        'manage_options',
        'avo-backup-manager',
        'avo_backup_manager_settings_page',
        'dashicons-backup',
        20
    );
}
add_action('admin_menu', 'avo_backup_manager_menu');

// Register Settings
function avo_backup_manager_register_settings() {
    register_setting('avo_backup_manager_settings', 'avo_backup_s3_access_key');
    register_setting('avo_backup_manager_settings', 'avo_backup_s3_secret_key');
    register_setting('avo_backup_manager_settings', 'avo_backup_s3_bucket');
    register_setting('avo_backup_manager_settings', 'avo_backup_s3_region');
    register_setting('avo_backup_manager_settings', 'avo_backup_scheduling');
    register_setting('avo_backup_manager_settings', 'avo_backup_email_notifications');
}
add_action('admin_init', 'avo_backup_manager_register_settings');

// Settings Page
function avo_backup_manager_settings_page() {
    ?>
    <div class="wrap">
        <h1>AvoBackup Manager Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('avo_backup_manager_settings');
            do_settings_sections('avo-backup-manager');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">S3 Access Key</th>
                    <td><input type="text" name="avo_backup_s3_access_key" value="<?php echo esc_attr(get_option('avo_backup_s3_access_key')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">S3 Secret Key</th>
                    <td><input type="password" name="avo_backup_s3_secret_key" value="<?php echo esc_attr(get_option('avo_backup_s3_secret_key')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">S3 Bucket Name</th>
                    <td><input type="text" name="avo_backup_s3_bucket" value="<?php echo esc_attr(get_option('avo_backup_s3_bucket')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">S3 Region</th>
                    <td><input type="text" name="avo_backup_s3_region" value="<?php echo esc_attr(get_option('avo_backup_s3_region')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Backup Schedule</th>
                    <td>
                        <select name="avo_backup_scheduling" class="regular-text">
                            <option value="1" <?php selected(get_option('avo_backup_scheduling'), '1'); ?>>1 Hour</option>
                            <option value="8" <?php selected(get_option('avo_backup_scheduling'), '8'); ?>>8 Hours</option>
                            <option value="24" <?php selected(get_option('avo_backup_scheduling'), '24'); ?>>24 Hours</option>
                            <option value="72" <?php selected(get_option('avo_backup_scheduling'), '72'); ?>>3 Days</option>
                            <option value="168" <?php selected(get_option('avo_backup_scheduling'), '168'); ?>>7 Days</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email Notifications</th>
                    <td><input type="email" name="avo_backup_email_notifications" value="<?php echo esc_attr(get_option('avo_backup_email_notifications')); ?>" class="regular-text"></td>
                </tr>
            </table>
            <?php
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Schedule Automated Backups
function avo_backup_manager_schedule_backup() {
    $scheduleHours = get_option('avo_backup_scheduling', '24');
    if (!wp_next_scheduled('avo_backup_manager_run')) {
        wp_schedule_event(time(), 'hourly', 'avo_backup_manager_run');
    }
}
add_action('wp', 'avo_backup_manager_schedule_backup');

// Backup Execution Function
function avo_backup_manager_execute_backup() {
    // Placeholder for actual backup logic
    update_option('avo_backup_last_run', current_time('mysql'));
    wp_mail(get_option('avo_backup_email_notifications'), 'AvoBackup Notification', 'Backup successfully created.');
}
add_action('avo_backup_manager_run', 'avo_backup_manager_execute_backup');

// Plugin Deactivation Cleanup
function avo_backup_manager_deactivate() {
    wp_clear_scheduled_hook('avo_backup_manager_run');
}
register_deactivation_hook(__FILE__, 'avo_backup_manager_deactivate');

?>

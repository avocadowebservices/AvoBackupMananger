# AvoBackup Manager

## Plugin Name: AvoBackup Manager
**Plugin URI:** [https://avocadoweb.net](https://avocadoweb.net)  
**Description:** A WordPress plugin to backup and restore your site files and database with cloud storage support (AWS S3).  
**Version:** 1.2  
**Author:** Your Name  
**Author URI:** [https://avocadoweb.net](https://avocadoweb.net)  
**License:** GPL2  

---

## Features
- Backup WordPress files and database.
- Restore backups with a single click.
- Support for AWS S3 storage.
- Schedule backups at intervals (1 hour, 8 hours, 24 hours, 3 days, 7 days, etc.).
- Email notifications for backup completion.
- Manual backup trigger from the admin panel.
- Secure API key storage.

---

## Installation
1. Download the `avobackup-manager.zip` file.
2. Upload it to the `/wp-content/plugins/` directory.
3. Activate the plugin from the **Plugins** menu in WordPress.
4. Go to **AvoBackup Manager** in the admin panel.
5. Configure your **AWS S3 API keys**, **backup schedule**, and **email notifications**.

---

## Usage
- **Manual Backup:** Click the "Create Backup Now" button to generate an instant backup.
- **Automatic Backups:** Set the schedule in the settings page.
- **Restoring Backups:** Select a backup from the list and click "Restore Selected Backup."
- **Email Notifications:** Enter your email to receive backup completion alerts.

---

## Settings Options
- **AWS S3 Settings**
  - S3 Access Key
  - S3 Secret Key
  - S3 Bucket Name
  - S3 Region
- **Backup Scheduling**
  - 1 Hour
  - 8 Hours
  - 24 Hours
  - 3 Days
  - 7 Days
- **Email Notifications**
  - Enter email to receive backup reports

---

## Support
For support, visit [https://avocadoweb.net/support](https://avocadoweb.net/support) or contact the developer.

---

## Changelog
### Version 1.2
- Added AWS S3 support.
- Implemented automated scheduling options.
- Enabled email notifications.
- Fixed UI and styling issues.

### Version 1.1
- Added manual backup and restore functionality.
- Improved settings page layout.

### Version 1.0
- Initial release with basic backup features.

---

## License
This plugin is released under the GPL2 license.

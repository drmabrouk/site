# Hosting Setup & Security Guide for jobedia.net

This guide provides instructions for the remaining tasks on Hostinger that cannot be automated via code.

## 1. File Permissions
To ensure security, set the following permissions in your Hostinger File Manager or via SSH:
- **Folders:** 755
- **Files:** 644
- **Storage & Bootstrap/Cache folders:** 775 (Laravel needs write access here)

Command:
```bash
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod -R 775 storage bootstrap/cache
```

## 2. Database Configuration
1. Log in to Hostinger hPanel.
2. Go to **Databases** > **MySQL Databases**.
3. Create a database named `jobedia_db`.
4. Create a user and assign it to the database with all privileges.
5. Update the `.env` file in the root directory with the new credentials:
   - `DB_DATABASE=jobedia_db`
   - `DB_USERNAME=your_username`
   - `DB_PASSWORD=your_password`

## 3. SSL & PHP Version
1. Go to **Advanced** > **SSL** and ensure SSL is active for `jobedia.net`.
2. Go to **Advanced** > **PHP Configuration** and set the version to **8.1** or higher (8.3 recommended).

## 4. Performance & Caching
1. **Cloudflare:** Point your domain nameservers to Cloudflare if desired, or enable Hostinger's Cloudflare integration in the panel.
2. **Hostinger Caching:** Enable "Object Cache" (Redis) in the Hostinger panel if available.
3. **Laravel Optimization:** Run these commands after deployment:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## 5. Security
1. **Login Protection:** Laravel Breeze provides basic rate limiting. Username changes are restricted to once every 60 days.
2. **Role-Based Access (RBAC):** Access to Admin and Employer dashboards is strictly controlled via middleware.
3. **Data Sanitization:** All inputs are validated and sanitized via Laravel's FormRequest and Eloquent.
4. **Email Verification:** Users must verify their email before accessing core features.
5. **Backups:** Enable Hostinger's automated daily backups in the **Files** > **Backups** section.
6. **Updates:** Regularly run `composer update` to keep dependencies secure.

## 6. Web Root Configuration
The project is configured to use `public_html` as the web root. Ensure Hostinger is pointing to this directory.

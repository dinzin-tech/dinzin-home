Deployment notes for contact form

1) ReCaptcha secret
- Set your production reCaptcha secret in environment, not in code.
  Example (Apache env or systemd):
  export RECAPTCHA_SECRET=your_secret_here
- Update `contact.php` to read from `getenv('RECAPTCHA_SECRET')` or your config.

2) Storage directory permissions
- Ensure webserver user owns the `storage` directory and files.
  sudo chown -R www-data:www-data /var/www/html/dinzin-home/storage
- Set secure permissions:
  sudo chmod -R 0755 /var/www/html/dinzin-home/storage
  sudo chmod 0644 /var/www/html/dinzin-home/storage/inquiries.json

3) SELinux (RHEL/CentOS)
- If SELinux is enabled, allow HTTPD to write:
  sudo chcon -R -t httpd_sys_rw_content_t /var/www/html/dinzin-home/storage

4) Atomic writes and safety
- `contact.php` now uses a temp file with `LOCK_EX` and `rename()` for atomic writes.
- File permissions are set to `0644` after write.

5) Rollback and backups
- Backup `inquiries.json` before major deploys.
  cp /var/www/html/dinzin-home/storage/inquiries.json /var/backups/inquiries.json.$(date +%F_%T)

6) Testing locally
- To test locally with the dev server, start:
  php -S 127.0.0.1:8000 -t /var/www/html/dinzin-home
- Use curl to simulate a submission:
  curl -X POST 'http://127.0.0.1:8000/contact.php' \
    -d 'name=Test' -d 'email=test@example.com' -d 'subject=Hi' -d 'message=hello' -d 'g-recaptcha-response=placeholder'

7) Notes
- The code no longer includes a permanent reCaptcha bypass and no longer logs PHP internals to /tmp.
- Ensure `RECAPTCHA_SECRET` is available to PHP before deploying.

If you want, I can update `contact.php` to read `RECAPTCHA_SECRET` from the environment now and remove the hardcoded secret.
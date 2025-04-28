#!/bin/bash
set -e

# Create necessary directories with proper permissions
echo "Setting up storage directories..."
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/app/public
mkdir -p /var/www/html/bootstrap/cache

# Set proper permissions - using secure permissions
# Apache runs as www-data, so we only need to set proper ownership
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache
chmod -R 755 /var/www/html/storage
chmod -R 755 /var/www/html/bootstrap/cache

# Wait for key to be generated
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:A9KrGqSwtTIVrvTC2tcK4mPkzuGSKaMEK9RwSBpXK0E=" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Create storage link if it doesn't exist
if [ ! -L /var/www/html/public/storage ]; then
    echo "Creating storage link..."
    php artisan storage:link
fi

# Run migrations if DB_MIGRATE environment variable is set to true
if [ "${DB_MIGRATE}" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Clear caches
echo "Clearing Laravel cache..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Final check on storage log permissions - ensure www-data has proper access
echo "Final permission check on log directory..."
chown -R www-data:www-data /var/www/html/storage/logs
chmod -R 755 /var/www/html/storage/logs

# Execute the passed command
exec apache2-foreground

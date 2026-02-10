#!/bin/bash
set -e
set -u

# Environmental variables
export HOME="/home/betingovet"
export COMPOSER_HOME="$HOME/.composer"

# SIMPLIFIED SINGLE FOLDER SETUP
APP_DIR="/home/betingovet/apps/project_management"
PHP82="/opt/alt/php82/usr/bin/php"
COMPOSER="/home/betingovet/bin/composer"
BRANCH="main"

echo "🚀 Starting simplified deployment in ONE folder..."

# Check if directory exists
if [ ! -d "$APP_DIR" ]; then
  echo "❌ Error: Application directory $APP_DIR not found."
  exit 1
fi

cd "$APP_DIR"

# 1. Pull latest code
echo "📥 Pulling latest code from $BRANCH..."
git fetch --all
git checkout "$BRANCH"
git reset --hard "origin/$BRANCH"

# 2. Permissions
# Ensure storage and cache are writable
echo "🔑 Adjusting permissions..."
chmod -R 775 storage bootstrap/cache || true

# 3. Install dependencies
if [ -f "composer.json" ]; then
  echo "🔨 Installing dependencies..."
  $PHP82 $COMPOSER install --no-dev --optimize-autoloader --no-interaction
fi

# 4. Migrations
if [ -f "artisan" ]; then
  echo "🔑 Running migrations..."
  $PHP82 artisan migrate --force
fi

# 5. Optimize
echo "⚡ Clearing and Optimizing Cache..."
if [ -f "artisan" ]; then
  $PHP82 artisan optimize:clear
  $PHP82 artisan config:cache
  $PHP82 artisan route:cache
  $PHP82 artisan view:cache
fi

echo "✅ Single-folder Update Complete!"
echo "   Public directory: $APP_DIR/public"

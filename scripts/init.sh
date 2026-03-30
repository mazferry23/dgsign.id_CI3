#!/bin/bash
# Init script for portaldev.dgsign.id
# Run this ONCE on hosting to setup git repo
# Usage: cd ~/portaldev.dgsign.id && bash scripts/init.sh

REPO_URL="https://github.com/mazferry23/dgsign.id_CI3.git"
BRANCH="main"
DEPLOY_DIR=$(pwd)

echo "========================================="
echo "  Init portal.dgsign.id"
echo "  Repo: $REPO_URL"
echo "  Dir: $DEPLOY_DIR"
echo "  $(date)"
echo "========================================="

echo ""
echo "[1/6] Init git repo..."
git init
git remote add origin "$REPO_URL" 2>/dev/null || echo "Remote origin already exists"

echo ""
echo "[2/6] Fetch from remote..."
git fetch origin

echo ""
echo "[3/6] Checkout $BRANCH..."
git checkout -b "$BRANCH" 2>/dev/null || git checkout "$BRANCH"
git branch --set-upstream-to=origin/"$BRANCH" "$BRANCH"

echo ""
echo "[4/6] Pull latest..."
git pull origin "$BRANCH"

echo ""
echo "[5/6] Install composer dependencies..."
if command -v composer &> /dev/null; then
    composer install --no-dev --optimize-autoloader
else
    echo "WARNING: composer not found, skip install"
    echo "Run manually: composer install --no-dev --optimize-autoloader"
fi

echo ""
echo "[6/6] Setup database config..."
if [ ! -f application/config/database.php ]; then
    cp application/config/database.php.example application/config/database.php
    echo "Created database.php from example - EDIT THIS FILE with your credentials!"
else
    echo "database.php already exists, skipping"
fi

echo ""
echo "========================================="
echo "  Init completed!"
echo ""
echo "  TODO:"
echo "  1. Edit application/config/database.php"
echo "  2. Set WABLAS_KEY in index.php"
echo "  3. Create upload folders if needed:"
echo "     mkdir -p public/invitation_qr public/invitation_ivt"
echo "     mkdir -p public/uploads public/wa_tmp excel"
echo "     chmod 755 public/invitation_qr public/invitation_ivt"
echo "     chmod 755 public/uploads public/wa_tmp excel"
echo "========================================="

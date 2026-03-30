#!/bin/bash
# Deploy script for portaldev.dgsign.id
# Usage: ssh user@host 'bash -s' < scripts/deploy.sh

BRANCH="main"

# Auto detect: production or staging
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
DEPLOY_DIR="$(dirname "$SCRIPT_DIR")"

echo "========================================="
echo "  Deploy portal.dgsign.id"
echo "  Branch: $BRANCH"
echo "  $(date)"
echo "========================================="

cd "$DEPLOY_DIR" || { echo "ERROR: Directory not found"; exit 1; }

echo ""
echo "[1/4] Stash local changes..."
git stash

echo ""
echo "[2/4] Pull latest from $BRANCH..."
git pull origin "$BRANCH"

echo ""
echo "[3/4] Restore local changes..."
git stash pop 2>/dev/null || echo "No stashed changes to restore"

echo ""
echo "[4/4] Done!"
echo ""
git log --oneline -3
echo ""
echo "========================================="
echo "  Deploy completed!"
echo "========================================="

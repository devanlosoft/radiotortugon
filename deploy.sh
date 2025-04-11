#!/bin/bash

echo "🚀 Iniciando despliegue..."

PROJECT_PATH="/var/www/rtortugon"
cd $PROJECT_PATH || exit

# Hacer pull del código
echo "📥 Actualizando desde Git..."
git pull origin main || {
    echo "❌ Error al hacer git pull"
    exit 1
}

echo "✅ ¡Despliegue finalizado!"

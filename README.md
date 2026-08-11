# Neumáticos - Sistema de Inventario

Repositorio para la aplicación de control de inventario de neumáticos y llantas por sucursal e inventario general.

MVP:
- Gestión de sucursales
- Catálogo de productos (neumáticos y llantas)
- Inventarios por sucursal y consolidado
- Movimientos e historial (ingreso/salida/ajuste/transferencia)
- Import/Export CSV
- Autenticación y roles

Stack recomendado: Laravel 10 + PostgreSQL + Vue 3 (Inertia) - opción por defecto, podemos cambiar si prefieres otro stack.

Siguientes pasos:
1. Crear scaffold de Laravel con Docker y configuración base.
2. Crear migraciones y modelos: branches, products, branch_inventories, inventory_movements, users/roles.
3. Implementar endpoints API y frontend inicial.

Branch propuesta para desarrollo: feature/scaffold-inventario

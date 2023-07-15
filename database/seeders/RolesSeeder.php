<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $admin = Role::create(['name' => 'Administrador']);
        $personal = Role::create(['name' => 'Personal']);
        $user = Role::create(['name' => 'Usuario']);
        //Permisos
        Permission::create(['name' => 'bitacora.index', 'description' => 'Ver Bitacora'])->syncRoles([$admin]);
        
        Permission::create(['name' => 'rol.index', 'description' => 'Vista Roles'])->syncRoles($admin);
        Permission::create(['name' => 'rol.registrar', 'description' => 'Crear Roles'])->syncRoles($admin);
        Permission::create(['name' => 'rol.editar', 'description' => 'Editar Roles'])->syncRoles($admin);

        Permission::create(['name' => 'permiso.index', 'description' => 'Vista Permiso'])->syncRoles($admin);
        Permission::create(['name' => 'permiso.registrar', 'description' => 'Crear Permiso'])->syncRoles($admin);
        Permission::create(['name' => 'permiso.editar', 'description' => 'Editar Permiso'])->syncRoles($admin);

        Permission::create(['name' => 'usuario', 'description' => 'Vista Usuario'])->syncRoles($admin);
        Permission::create(['name' => 'usuario-registro', 'description' => 'Crear Usuario'])->syncRoles($admin);
        Permission::create(['name' => 'usuario-editar', 'description' => 'Editar Usuario'])->syncRoles($admin);

        Permission::create(['name' => 'perosnal.index', 'description' => 'Vista Personal'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'personal-registro', 'description' => 'Crear Personal'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'personal-editar', 'description' => 'Editar Personal'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'servicio.index', 'description' => 'Vista Servicio'])->syncRoles($admin);
        Permission::create(['name' => 'servicio.registrar', 'description' => 'Crear Servicio'])->syncRoles($admin);
        Permission::create(['name' => 'servicio.editar', 'description' => 'Editar Servicio'])->syncRoles($admin);

        Permission::create(['name' => 'tservicio.index', 'description' => 'Vista Tipo Servicio'])->syncRoles($admin);
        Permission::create(['name' => 'tservicio.registrar', 'description' => 'Crear Tipo Servicio'])->syncRoles($admin);
        Permission::create(['name' => 'tservicio.editar', 'description' => 'Editar Tipo Servicio'])->syncRoles($admin);

        Permission::create(['name' => 'membresia', 'description' => 'Vista Membresia'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'membresia-registrar', 'description' => 'Crear Membresia'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'membresia-editar', 'description' => 'Editar Membresia'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'proveedor.index', 'description' => 'Ver Proveedor'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'proveedor-registro', 'description' => 'Crear Proveedor'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'proveedor-editar', 'description' => 'Editar Proveedor'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'marca.index', 'description' => 'Ver Marca'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'marca.registrar', 'description' => 'Crear Marca'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'marca.editar', 'description' => 'Editar Marca'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'categoria.index', 'description' => 'Ver Categoria'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'categoria.registrar', 'description' => 'Crear Categoria'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'categoria.editar', 'description' => 'Editar Categoria'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'producto.index', 'description' => 'Ver Producto'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'producto.registrar', 'description' => 'Crear Producto'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'producto.editar', 'description' => 'Editar Producto'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'nota_compra.index', 'description' => 'Ver Nota Compra'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'nota_compra.registrar', 'description' => 'Crear Nota Compra'])->syncRoles($admin, $personal);
        Permission::create(['name' => 'nota_compra.editar', 'description' => 'Editar Nota Compra'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'nota_compra.pdf', 'description' => 'Ver Reportes'])->syncRoles($admin, $personal);

        Permission::create(['name' => 'transaccion', 'description' => 'Ver Transaccion'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'transaccion.registrar', 'description' => 'Crear Transaccion'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'Transaccion.editar', 'description' => 'Editar Transaccion'])->syncRoles($admin, $personal, $user);

        Permission::create(['name' => 'cliente.index', 'description' => 'Ver cliente'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'cliente.registrar', 'description' => 'Crear cliente'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'cliente.editar', 'description' => 'Editar Transaccion'])->syncRoles($admin, $personal, $user);

        Permission::create(['name' => 'estado.index', 'description' => 'Ver estado'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'estado.registrar', 'description' => 'Crear estado'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'estado.editar', 'description' => 'Editar estado'])->syncRoles($admin, $personal, $user);

        Permission::create(['name' => 'area.index', 'description' => 'Ver area'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'area.registrar', 'description' => 'Crear area'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'area.editar', 'description' => 'Editar area'])->syncRoles($admin, $personal, $user);

        Permission::create(['name' => 'reserva.index', 'description' => 'Ver reserva'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'reserva.registrar', 'description' => 'Crear reserva'])->syncRoles($admin, $personal, $user);
        Permission::create(['name' => 'reserva.editar', 'description' => 'Editar reserva'])->syncRoles($admin, $personal, $user);


    }
}

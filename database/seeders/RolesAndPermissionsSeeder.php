<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        Permission::create(['name' => 'publicar posts']);
        Permission::create(['name' => 'guardar borrador']);
        Permission::create(['name' => 'comentar']);

        // Crear roles y asignar permisos
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['publicar posts', 'guardar borrador', 'comentar']);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo(['guardar borrador', 'comentar']);

        $usuario = Role::create(['name' => 'usuario']);
        $usuario->givePermissionTo(['comentar']);

        // Asignar rol al usuario actual (puedes cambiar el ID o usar email)
        $adminUser = User::find(1);
        $adminUser->assignRole('admin');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $blogger = Role::create(['name' => 'blogger']);
        $editor = Role::create(['name' => 'editor']);
        $admin = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'posts.index'])->syncRoles([$blogger, $editor, $admin]);
        Permission::create(['name' => 'posts.store'])->syncRoles([$blogger, $editor, $admin]);
        Permission::create(['name' => 'posts.show'])->syncRoles([$blogger, $editor, $admin]);
        Permission::create(['name' => 'posts.update'])->syncRoles([$blogger, $editor, $admin]);
        Permission::create(['name' => 'posts.destroy'])->syncRoles([$editor, $admin]);

        Permission::create(['name' => 'users.index'])->syncRoles([$editor, $admin]);
        Permission::create(['name' => 'users.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.show'])->syncRoles([$editor, $admin]);
        Permission::create(['name' => 'users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$admin]);
    }
}

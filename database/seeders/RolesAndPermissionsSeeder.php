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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $collection = collect([
            'Slider',
            'Users',
            'Admin',
            'Product',
            'Category',
            'Banner',
            'Shop',
            'Role',
            'Permission'
            // ... // List all your Models you want to have Permissions for.
        ]);

        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Permission::create(['group' => $item, 'name' => 'viewAny' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'view' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'update' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'create' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'delete' . $item, 'guard_name' => 'admins']);
            Permission::create(['group' => $item, 'name' => 'destroy' . $item, 'guard_name' => 'admins']);
        });

        // Create a Super-Admin Role and assign all Permissions
        $role = Role::create(['name' => 'super-admin', 'guard_name' => 'admins']);
        $role->givePermissionTo(Permission::all());

        // Give User Super-Admin Role
        $user = \App\Models\Admin::where('email', 'kamran.badalov@amiroff.az')->first(); // Change this to your email.
        $user->assignRole('super-admin');
    }
}

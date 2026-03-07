<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('shield:generate', [
            '--all'            => true,
            '--option'         => 'policies_and_permissions',
            '--panel'          => 'admin',
            '--no-interaction' => true,
        ]);

        // Roles
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        // Permissions 
        $adminPermissions = Permission::whereNotLike('name', '%:Role')->get();

        $userPermissions = [
            // Kosongkan array karena tidak ada permission khusus untuk user
            // atau tambahkan permission lain jika diperlukan
        ];

        $adminRole->givePermissionTo($adminPermissions);
        
        // Berikan permission ke user role hanya jika ada permission yang didefinisikan
        if (!empty($userPermissions)) {
            $userRole->givePermissionTo($userPermissions);
        }

        // Hapus blok kode untuk remove permission karena sudah tidak diperlukan
        
        // Assign roles to user
        $superAdminUser = User::where('username', 'superadmin')->first();
        $adminUser      = User::where('username', 'admin')->first();
        $normalUser     = User::where('username', 'user')->first();

        if ($superAdminUser) $superAdminUser->assignRole('super_admin');
        if ($adminUser)      $adminUser->assignRole('admin');
        if ($normalUser)     $normalUser->assignRole('user');
    }
}

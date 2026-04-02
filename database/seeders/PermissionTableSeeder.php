<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class PermissionTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $permissions = [
            ['name' => 'category-list', 'display_name' => 'Service Category list'],
            ['name' => 'category-create', 'display_name' => 'Service Category create'],
            ['name' => 'category-edit', 'display_name' => 'Service Category edit'],
            ['name' => 'category-delete', 'display_name' => 'Service Category delete'],
            ['name' => 'service-list', 'display_name' => 'Service list'],
            ['name' => 'service-create', 'display_name' => 'Service create'],
            ['name' => 'service-edit', 'display_name' => 'Service edit'],
            ['name' => 'service-delete', 'display_name' => 'Service delete'],
            ['name' => 'blog-category-list', 'display_name' => 'Blog Category list'],
            ['name' => 'blog-category-create', 'display_name' => 'Blog Category create'],
            ['name' => 'blog-category-edit', 'display_name' => 'Blog Category edit'],
            ['name' => 'blog-category-delete', 'display_name' => 'Blog Category delete'],
            ['name' => 'blog-list', 'display_name' => 'Blog list'],
            ['name' => 'blog-create', 'display_name' => 'Blog create'],
            ['name' => 'blog-edit', 'display_name' => 'Blog edit'],
            ['name' => 'blog-delete', 'display_name' => 'Blog delete'],
            
            ['name' => 'page-list', 'display_name' => 'Page list'],
            ['name' => 'page-create', 'display_name' => 'Page create'],
            ['name' => 'page-edit', 'display_name' => 'Page edit'],
            ['name' => 'page-delete', 'display_name' => 'Page delete'],
            ['name' => 'subpage-list', 'display_name' => 'Page list'],
            ['name' => 'subpage-create', 'display_name' => 'Page create'],
            ['name' => 'subpage-edit', 'display_name' => 'Page edit'],
            ['name' => 'subpage-delete', 'display_name' => 'Page delete'],
            ['name' => 'page-content-list', 'display_name' => 'Page Content list'],
            ['name' => 'page-content-create', 'display_name' => 'Page Content create'],
            ['name' => 'page-content-edit', 'display_name' => 'Page Content edit'],
            ['name' => 'page-content-delete', 'display_name' => 'Page Content delete'],
            ['name' => 'client-review-list', 'display_name' => 'Client Review list'],
            ['name' => 'client-review-create', 'display_name' => 'Client Review create'],
            ['name' => 'client-review-edit', 'display_name' => 'Client Review edit'],
            ['name' => 'client-review-delete', 'display_name' => 'Client Review delete'],

            ['name' => 'university-create', 'display_name' => 'University create'],
            ['name' => 'university-list', 'display_name' => 'University list'],
            ['name' => 'university-edit', 'display_name' => 'University edit'],
            ['name' => 'university-delete', 'display_name' => 'University delete'],
            ['name' => 'course-create', 'display_name' => 'Course create'],
            ['name' => 'course-list', 'display_name' => 'Course list'],
            ['name' => 'course-edit', 'display_name' => 'Course edit'],
            ['name' => 'course-delete', 'display_name' => 'Course delete'],
            ['name' => 'apply-create', 'display_name' => 'Apply create'],
            ['name' => 'apply-list', 'display_name' => 'Apply list'],
            ['name' => 'apply-edit', 'display_name' => 'Apply edit'],
            ['name' => 'apply-delete', 'display_name' => 'Apply delete'],

            ['name' => 'address-create', 'display_name' => 'Address create'],
            ['name' => 'address-list', 'display_name' => 'Address list'],
            ['name' => 'address-edit', 'display_name' => 'Address edit'],
            ['name' => 'address-delete', 'display_name' => 'Address delete'],
            ['name' => 'transaction-create', 'display_name' => 'Transaction create'],
            ['name' => 'transaction-list', 'display_name' => 'Transaction list'],
            ['name' => 'transaction-edit', 'display_name' => 'Transaction edit'],
            ['name' => 'transaction-delete', 'display_name' => 'Transaction delete'],
            ['name' => 'contact-list', 'display_name' => 'Contact message list'],
            ['name' => 'contact-delete', 'display_name' => 'Contact message delete'],

            ['name' => 'user-create', 'display_name' => 'User create'],
            ['name' => 'user-list', 'display_name' => 'User list'],
            ['name' => 'user-edit', 'display_name' => 'User edit'],
            ['name' => 'user-delete', 'display_name' => 'User delete'],
            ['name' => 'agent-create', 'display_name' => 'Agent create'],
            ['name' => 'agent-list', 'display_name' => 'Agent list'],
            ['name' => 'agent-edit', 'display_name' => 'Agent edit'],
            ['name' => 'agent-delete', 'display_name' => 'Agent delete'],
            ['name' => 'role-list', 'display_name' => 'Role list'],
            ['name' => 'role-create', 'display_name' => 'Role create'],
            ['name' => 'role-edit', 'display_name' => 'Role edit'],
            ['name' => 'role-delete', 'display_name' => 'Role delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $roles = [
            ['name' => 'superadmin'],
            ['name' => 'admin'],
            ['name' => 'staff'],
            ['name' => 'agent'],
        ];

        foreach ($roles as $role) {
            ModelsRole::create($role);
        }
    }

}

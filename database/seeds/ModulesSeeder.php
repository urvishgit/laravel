<?php

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModulesSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'title' => 'User',
                'display_name' => 'Users',
                'description' => 'Manage who can access the administration area to your website',
                'icon' => 'fas fa-users',
                'route'=> 'admin.users.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.users.index',
                'order' => '1',
                'is_administrator_module' => 1,
                'slug' => 'user',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Category',
                'display_name' => 'Categories',
                'description' => 'Add, edit, delete and organise the category of your website.',
                'icon' => 'far fa-list-alt',
                'route'=> 'admin.categories.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.categories.index',
                'order' => '2',
                'is_administrator_module' => 0,
                'slug' => 'category',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Brand',
                'display_name' => 'Brands',
                'description' => 'Add, edit, delete and organise the brand for product of your website.',
                'icon' => 'fas fa-briefcase',
                'route'=> 'admin.brands.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.brands.index',
                'order' => '3',
                'is_administrator_module' => 0,
                'slug' => 'brand',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Tag',
                'display_name' => 'Tags',
                'description' => 'Add, edit, delete and organise the tag for news of your website.',
                'icon' => 'fas fa-tags',
                'route'=> 'admin.tags.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.tags.index',
                'order' => '4',
                'is_administrator_module' => 0,
                'slug' => 'tag',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Article',
                'display_name' => 'News',
                'description' => 'Add, edit, delete and organise the news article of your website.',
                'icon' => 'far fa-newspaper',
                'route'=> 'admin.articles.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.articles.index',
                'order' => '5',
                'is_administrator_module' => 0,
                'slug' => 'article',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Casestudy',
                'display_name' => 'Casestudies',
                'description' => 'Add, edit, delete and organise the tag for casestudy of your website.',
                'icon' => 'fas fa-pen-square',
                'route'=> 'admin.casestudies.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.casestudies.index',
                'order' => '6',
                'is_administrator_module' => 0,
                'slug' => 'casestudy',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Team',
                'display_name' => 'Team',
                'description' => 'Add, edit, delete and organise the product of your website.',
                'icon' => 'far fa-user',
                'route'=> 'admin.team.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.team.index',
                'order' => '7',
                'is_administrator_module' => 0,
                'slug' => 'team',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Page',
                'display_name' => 'Pages',
                'description' => 'Add, edit, delete and organise the tag for pages of your website.',
                'icon' => 'far fa-file',
                'route'=> 'admin.pages.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.pages.index',
                'order' => '8',
                'is_administrator_module' => 0,
                'slug' => 'page',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Enquiry',
                'display_name' => 'Enquiries',
                'description' => 'View and organise the enquiry of your website.',
                'icon' => 'far fa-envelope',
                'route'=> 'admin.enquiries.index',
                'trash' => 0,
                'trash_route' => null,
                'order' => '9',
                'is_administrator_module' => 0,
                'slug' => 'enquiry',
                'status' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Product',
                'display_name' => 'Products',
                'description' => 'Add, edit, delete and organise the product of your website.',
                'icon' => 'fab fa-product-hunt',
                'route'=> 'admin.products.index',
                'trash' => 1,
                'trash_route' => 'admin.trashed.products.index',
                'order' => '10',
                'is_administrator_module' => 0,
                'slug' => 'product',
                'status' => 1,
                'published_at' => now(),
            ],
        ];
        
        foreach ($modules as $index => $module)
        {
            $result = Module::create($module);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($modules). ' records');
    }
}

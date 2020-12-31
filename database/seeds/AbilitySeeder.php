<?php

use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $abilities = array(
            [
                'name' => 'user-create',
                'title' => 'Users Create'
            ],
            [
                'name' => 'user-view',
                'title' => 'Users List View'
            ],
            [
                'name' => 'user-edit',
                'title' => 'Users Edit '
            ],
            [
                'name' => 'user-del',
                'title' => 'Users Delete'
            ],

            [
                'name' => 'role-create',
                'title' => 'Role Create'
            ],
            [
                'name' => 'role-view',
                'title' => 'Role List View'
            ],
            [
                'name' => 'role-edit',
                'title' => 'Role Edit'
            ],
            [
                'name' => 'role-del',
                'title' => 'Role Delete'
            ],

            [
                'name' => 'cat-create',
                'title' => 'Category Create'
            ],
            [
                'name' => 'cat-view',
                'title' => 'Category List View'
            ],
            [
                'name' => 'cat-edit',
                'title' => 'Category Edit'
            ],
            [
                'name' => 'cat-del',
                'title' => 'Category Delete'
            ],


            [
                'name' => 'brand-create',
                'title' => 'Brand Create'
            ],
            [
                'name' => 'brand-view',
                'title' => 'Brand List View'
            ],
            [
                'name' => 'brand-edit',
                'title' => 'Brand Edit'
            ],
            [
                'name' => 'brand-del',
                'title' => 'Brand Delete'
            ],


            [
                'name' => 'product-create',
                'title' => 'Product Create'
            ],
            [
                'name' => 'product-view',
                'title' => 'Product List View'
            ],
            [
                'name' => 'product-edit',
                'title' => 'Product Edit'
            ],
            [
                'name' => 'product-del',
                'title' => 'Product Delete'
            ],


            [
                'name' => 'attr-create',
                'title' => 'Product Attribute Create'
            ],
            [
                'name' => 'attr-view',
                'title' => 'Product Attribute List View'
            ],
            [
                'name' => 'attr-edit',
                'title' => 'Product Attribute Edit'
            ],
            [
                'name' => 'attr-del',
                'title' => 'Product Attribute Delete'
            ],

            [
                'name' => 'order-view',
                'title' => 'Order List View'
            ],
            [
                'name' => 'order-del',
                'title' => 'Order Delete'
            ],

            [
                'name' => 'customer-view',
                'title' => 'Customer List View'
            ],
            [
                'name' => 'customer-edit',
                'title' => 'Customer Edit'
            ],
            [
                'name' => 'customer-del',
                'title' => 'Customer Delete'
            ]
        );

        foreach ($abilities as $row){
            Bouncer::ability()->firstOrCreate([
                'name' => $row['name'],
                'title' => $row['title']
            ]);
        }
    }
}

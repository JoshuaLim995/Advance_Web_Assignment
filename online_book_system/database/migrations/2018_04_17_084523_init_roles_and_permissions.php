<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Administrator'
            ]);

        $member = Bouncer::role()->create([
            'name' => 'member',
            'title' => 'Member'
            ]);

        $viewCategory = Bouncer::ability()->create([
            'name' => 'view-category',
            'title' => 'View Category',
            ]);

        $createCategory = Bouncer::ability()->create([
            'name' => 'create-category',
            'title' => 'Create Category',
            ]);

        $manageCategory = Bouncer::ability()->create([
            'name' => 'manage-category',
            'title' => 'Manage Category',
            ]);

        $viewBook = Bouncer::ability()->create([
            'name' => 'view-book',
            'title' => 'View Book',
            ]);

        $createBook = Bouncer::ability()->create([
            'name' => 'create-book',
            'title' => 'Create Book',
            ]);

        $manageBook = Bouncer::ability()->create([
            'name' => 'manage-book',
            'title' => 'Manage Book',
            ]);

        $viewUser = Bouncer::ability()->create([
            'name' => 'view-user',
            'title' => 'View User',
            ]);

        $createUser = Bouncer::ability()->create([
            'name' => 'create-user',
            'title' => 'Create User',
            ]);

        $manageUser = Bouncer::ability()->create([
            'name' => 'manage-user',
            'title' => 'Manage User',
            ]);


        Bouncer::allow($admin)->to($viewBook);
        Bouncer::allow($admin)->to($createBook);
        Bouncer::allow($admin)->to($manageBook);
        Bouncer::allow($admin)->to($viewUser);
        Bouncer::allow($admin)->to($createUser);
        Bouncer::allow($admin)->to($manageUser);
        Bouncer::allow($admin)->to($viewCategory);
        Bouncer::allow($admin)->to($createCategory);
        Bouncer::allow($admin)->to($manageCategory);

        Bouncer::allow($member)->to($viewBook);
        Bouncer::allow($member)->to($viewCategory);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class InsertIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            [
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'password' => bcrypt('1234567890'),
            ],
            [
            'email' => 'member@member.com',
            'name' => 'member',
            'password' => bcrypt('1234567890'),
            ]
            ]);

        $admin = User::find(1);
        Bouncer::assign('admin')->to($admin);

        $member = User::find(2);
        Bouncer::assign('member')->to($member);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

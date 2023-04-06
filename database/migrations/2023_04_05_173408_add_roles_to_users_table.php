<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->after('email')->nullable()->default(false);
            $table->boolean('is_revisor')->after('is_admin')->nullable()->default(false);
            $table->boolean('is_writer')->after('is_revisor')->nullable()->default(false);
        });

        $user = User::create([
            'name' => 'admin',
            'eemail' => 'admin@theaulabpost.it',
            'Password' => bcrypt('12345678'),
            'is_admin' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        User::where('email', 'admin@theaulabpost.it')->delete();

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer']);
        });
    }
};

<?php

use App\Enums\UserType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->unsigned()->default(UserType::Organiser);
            $table->string('phone', 15)->nullable();
            $table->string('profile_photo')->nullable();
            $table->text('short_description')->nullable();
            $table->string('website_url')->nullable();
            $table->rememberToken();
            $table->nullableTimestamps();
        });

        Artisan::call('db:seed', [
            '--class' => AdminUserSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

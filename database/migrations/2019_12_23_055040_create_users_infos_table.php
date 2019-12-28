<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->nullable();
            $table->string('email',50)->unique();
            $table->longText('avatar')->nullable();
            $table->longText('cover_image')->nullable();
            $table->string('full_name',50)->nullable();
            $table->string('english_name',50)->nullable();// Tên tiếng anh
            $table->string('nickname',50)->nullable();
            $table->longText('introduce')->nullable();
            $table->date('birthday')->nullable();// ngày sinh
            $table->integer('sex')->nullable()->default(1);// giới tính
            $table->integer('age')->nullable();// Tuổi
            $table->integer('nation')->nullable();//Quốc Gia
            $table->date('working_day')->nullable();// ngày vào làm
            $table->string('postal_code',100)->nullable();// mã bưu chính
            $table->string('address_1',255)->nullable();//
            $table->string('address_2',255)->nullable();//
            $table->string('address_3',255)->nullable();//
            $table->string('company_name',255)->nullable();//
            $table->string('city_name',255)->nullable();//
            $table->string('provincial',255)->nullable();//
            $table->string('phone_number',15)->nullable();//
            $table->string('internal_number',15)->nullable();//
            $table->string('fax',255)->nullable();//
            $table->string('mobile_number',255)->nullable();//
            $table->string('skin_class',10)->nullable()->default('skin-1');
            // Khóa NGoại
            $table->foreign('users_id')->references('id')->on('users') ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_infos');
    }
}

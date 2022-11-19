<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomAttributesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function (Blueprint $table) {
            $table ->uuid("_id") ->after("id");
            $table ->string('name')->nullable()->change();
            $table ->string('first_name') ->nullable() ->after('name');
            $table ->string("gender") ->nullable() ->after('first_name');
            $table ->string('phone_number') ->nullable() ->after('gender');
            $table ->string('whatsapp_number') ->nullable() ->after('phone_number');
            $table ->string("is_admin") ->nullable() ->after('whatsapp_number');
            $table ->string("has_agreed_with_policy_and_terms_at") ->nullable() ->after('remember_token');
            $table ->string("last_login_at") ->nullable();
            $table ->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function (Blueprint $table) {
            $table ->dropColumn("_id");
            $table ->dropColumn('name');
            $table ->dropColumn('first_name');
            $table ->dropColumn("gender");
            $table ->dropColumn("is_admin");
            $table ->dropColumn('phone_number');
            $table ->dropColumn('whatsapp_number');
            $table ->dropColumn("has_agreed_with_policy_and_terms_at");
            $table ->dropColumn("last_login_at");
            $table ->dropColumn("deleted_at");
        });
    }
}
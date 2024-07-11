<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('role_id')->default(2)->after('name');
            $table->enum('status', [1, 0])->nullable()->after('password');
            $table->string('provider_id')->nullable()->after('email_verified_at'); // Google Field

            // Define restriction
            $table->foreign('role_id')->references('id')->on('roles');

        });
        
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['role_id']);

            $table->dropColumn('role_id');
            $table->dropColumn('status');
            $table->dropColumn('provider_id');

        });

        Schema::enableForeignKeyConstraints();
    }
};
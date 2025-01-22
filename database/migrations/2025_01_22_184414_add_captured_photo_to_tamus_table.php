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
        Schema::table('tamus', function (Blueprint $table) {
            $table->string('captured_photo')->nullable()->after('keperluan');
        });
    }
    
    public function down()
    {
        Schema::table('tamus', function (Blueprint $table) {
            $table->dropColumn('captured_photo');
        });
    }
    
};

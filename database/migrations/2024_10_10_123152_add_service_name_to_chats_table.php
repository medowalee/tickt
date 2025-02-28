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
        Schema::table('chats', function (Blueprint $table) {
            $table->string('service_name')->nullable(); // إضافة حقل لتخزين اسم الخدمة
        });
    }
    
    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropColumn('service_name'); // إزالة الحقل عند التراجع
        });
    }
    
};

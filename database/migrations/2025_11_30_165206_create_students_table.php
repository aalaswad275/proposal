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
        Schema::create('students', function (Blueprint $table) {
             $table->id();

            $table->string('name');                     // اسم الطالب
            $table->string('std_id')->unique();         // الرقم الأكاديمي
            $table->unsignedBigInteger('std_dept');     // القسم (Department ID)
            $table->string('std_level');                // المستوى الدراسي
            $table->string('std_semester');             // الفصل الدراسي
            $table->string('std_address');              // العنوان
            $table->string('std_phone');                // رقم الهاتف
            $table->string('std_email')->unique();      // البريد الإلكتروني
            $table->string('std_supervisor');           // اسم المشرف
            $table->string('std_image')->nullable();    // صورة الطالب

            $table->timestamps();

            // ربط الطالب بالقسم (اختياري لكنه احترافي)
            $table->foreign('std_dept')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

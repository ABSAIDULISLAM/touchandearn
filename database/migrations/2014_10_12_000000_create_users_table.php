<?php

use App\Enums\Status;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('number')->unique();
            $table->string('whats_app')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('image')->nullable();
            $table->string('role_as')->default('member');
            $table->string('password');
            $table->string('ballance')->nullable()->default(0.00);
            $table->string('activation_points')->nullable()->default('0.00');
            $table->string('freeze_points')->nullable()->default('0.00');
            $table->string('withdraw')->nullable()->default('0.00');
            $table->string('referral_code')->nullable();
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('message')->nullable();
            $table->string('wp_message')->nullable();
            $table->string('myleads_response')->nullable();
            $table->string('subadmintype')->nullable();
            $table->enum('status',[Status::Active->value,Status::Deactivate->value])->default(Status::Deactivate->value);
            $table->boolean('points_distributed')->default(false);
            $table->timestamp('last_seen')->nullable();
            $table->timestamp('management_type')->nullable()->default('controller');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('referrer_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

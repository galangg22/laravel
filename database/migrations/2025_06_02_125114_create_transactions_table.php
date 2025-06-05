<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_id')->unique();
            $table->string('transaction_id')->unique();
            $table->decimal('gross_amount', 15, 2);
            $table->string('transaction_status');
            $table->string('payment_type');
            $table->string('fraud_status');
            $table->string('payment_code')->nullable();
            $table->string('va_number')->nullable();
            $table->string('bank')->nullable();
            $table->text('signature_key')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

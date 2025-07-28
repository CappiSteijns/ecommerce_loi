<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('state_id');
            $table->string('shipping_name'); // Naam van de ontvanger
            $table->string('shipping_email'); // E-mailadres van de ontvanger
            $table->string('shipping_phone'); // Telefoonnummer van de ontvanger

            // Nederlandse adresvelden
            $table->string('street_name'); // Straatnaam
            $table->string('house_number'); // Huisnummer
            $table->string('house_number_suffix')->nullable(); // Toevoeging (bijv. "A", "bis")
            $table->string('post_code'); // Postcode
            $table->string('city'); // Plaatsnaam
            $table->string('province'); // Provincie

            // Bezorging
            $table->string('delivery_day'); // Dag van bezorging (bijv. maandag, dinsdag)
            $table->string('delivery_time'); // Tijdslot (bijv. 08:00 - 12:00)
            $table->decimal('delivery_cost', 8, 2); // Kosten van het tijdslot

            $table->text('notes')->nullable(); // Eventuele opmerkingen

            // Betalingsinformatie
            $table->string('payment_type');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id');
            $table->string('currency');
            $table->float('amount', 8, 2);  
            $table->string('order_number');
            $table->string('invoice_no');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
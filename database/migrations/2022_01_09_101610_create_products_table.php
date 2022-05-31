<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku_code')->nullable();
            $table->string('product_thambnail')->nullable();
            $table->string('product_code');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('sub_sub_category_id')->nullable();
            $table->string('product_name');
            $table->string('product_slug_name')->nullable()->unique();
            
             $table->string('supplier_product_code')->nullable();
        
            $table->string('unit')->nullable();
            $table->string('product_qty')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('selling_price')->nullable();
            $table->float('discount_price')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('product_expire_date')->nullable();
            $table->string('product_expire_alert_date')->nullable();
            $table->string('product_stock_alert')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('barCode')->nullable();
            $table->string('status')->default(0);
            $table->string('purchase_qty')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('refundable')->nullable();
            $table->string('video_link')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->longText('product_descp')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_desc')->nullable();
            $table->string('shipping')->nullable();
            $table->float('shipping_fee')->nullable();
            $table->string('cash_on_delivery')->nullable();
            $table->string('hot_deals')->nullable();
            $table->string('featured')->nullable();
            $table->string('special_offer')->nullable();
            $table->string('special_deals')->nullable();
            $table->string('vat')->nullable();
            $table->integer('product_views')->default(0);
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
        Schema::dropIfExists('products');
    }
}

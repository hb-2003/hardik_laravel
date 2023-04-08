<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;





class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'total_tax',
        'customers_id',
        'customers_name',
        'customers_company',
        'customers_company',
        'customers_suburb',
        'customers_city',
        'customers_postcode',
        'customers_state',
        'customers_country',
        'customers_telephone',
        'email',       'customers_address_format_id',
        'delivery_name',
        'delivery_company',
        'delivery_street_address',
        'delivery_suburb',
        'delivery_city',
        'delivery_postcode',
        'delivery_state',
        'delivery_country	',
        'delivery_address_format_id',
        'billing_name',
        'billing_company',
        'billing_street_address',
        'billing_suburb',
        'billing_city',
        'billing_postcode',
        'billing_state',
        'billing_country',
        'billing_address_format_id',
        'payment_method',
        'cc_type',
        'cc_owner',
        'cc_number',
        'last_modifiedcc_expires',
        'date_purchased',
        'orders_date_finished',
        'currency',
        'currency_value',
        'order_price',
        'shipping_cost',
        'shipping_method',
        'shipping_duration',
        'order_information',
        'is_seen',
        'coupon_code',
        'coupon_amount',
        'product_categories',
        'free_shipping',
        'product_ids',
        'delivery_phone',
        'pyment_type',
        'transaction_id',
        'status',
        'order_status',
        'return_reason'
    

    ];

    function order_product()
    {
        // return $this->hasOne(ProductImage::class);
        return $this->hasMany(order_product::class,'orders_id','id');
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['customer_id','customer_name', 'product_id','product_name', 'total_amount','payment_id','payer_id', 'status'];
}
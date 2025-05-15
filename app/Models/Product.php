<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 't_product';
    protected $fillable = [
        't_product_code','master_cabang_code','t_category_code','t_product_name','t_product_type','t_product_price','t_product_disc','t_product_status','t_product_desc'
     ];
}

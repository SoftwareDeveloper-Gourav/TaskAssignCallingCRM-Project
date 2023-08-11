<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $primaryKey = "customer_id";
    protected $fillable = ['customer_name', 'customer_number', 'customer_email','msg'];
}
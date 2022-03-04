<?php

namespace App\Model\Customer_type;
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;

    protected $fillable = ['nama','alamat','lat','long','cusType','ttl','keterangan','status'];

    protected $table = 'customer';

    // public function customerType()
    // {
    //     return $this->belongsTo(CustomerType::class,'id');
    // }
}

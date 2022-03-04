<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CustomerType extends Model
{
    use Notifiable;

    protected $fillable = ['nama','alamat'];

    protected $table = 'CustomerType';

    // public function customer()
    // {
    //     return $this->hasMany(Customer::class);
    // }
}

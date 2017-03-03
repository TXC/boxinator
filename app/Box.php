<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function calcShippingCost() {


        $rate = 0.0;
        switch($this->destination) {
            case 'sweden':
                $rate = 1.3;
                break;
            case 'china':
                $rate = 4.0;
                break;
            case 'brazil':
                $rate = 8.6;
                break;
            case 'australia':
                $rate = 7.2;
                break;
        }
        $this->cost = ($this->weight * $rate);

        return $this;
    }
}

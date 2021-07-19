<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;
    protected $fillable = ['random_n', 'D_N', 'n_100', 'd_100', 'd_minus_100', 'D_plus', 'D_minus', 'D_max'];
    public $timestamps = false;

    public function scopeCalc_D_N_Plus($query, $n)
    {
        $i=1;
        $d_plus = [];
        foreach ($n as $one_n) {
            $d_plus[$i-1] = ($i / count($n)) - $one_n;
            $i++;
        }
        return $d_plus;
    }

    public function scopeCalc_D_N_Minus($query, $n)
    {
        $i=1;
        $d_minus = [];
        foreach ($n as $one_n) {
            $d_minus[$i-1] = $one_n - (($i-1)/count($n));
            $i++;
        }
        return $d_minus;
    }
}

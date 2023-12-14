<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employee';

    /**
     * 
     * @param integer $limit
     * @return void
     */
    public static function findAll(int $limit){
        
        return self::orderBy('employee.id','DESC')
                    ->paginate($limit);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expense_type;


class Expense extends Model
{
    use HasFactory;



    public function expense_type_name()
    {
        return $this->belongsTo(Expense_type::class, 'expense_type', 'id');
    }
}

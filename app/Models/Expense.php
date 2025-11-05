<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title', 'amount', 'category_id', 'date', 'note']; // ✅ title (not name)

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

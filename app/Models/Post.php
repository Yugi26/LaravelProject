<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 
        'body',
        'category_id',
    ];

    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べ、取得件数を制限する
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べ、limiteで取得件数を制限する
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    // Categoryに対するリレーション

    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
?>
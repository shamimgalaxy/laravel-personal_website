<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    // Since your migration created 'id', make sure Eloquent knows to use 'id'
    // If you have "protected $primaryKey = 'cat_id';" DELETE IT or change it to:
    protected $primaryKey = 'id'; 
    
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(BlogPost::class,'blogcat_id');
    }
}
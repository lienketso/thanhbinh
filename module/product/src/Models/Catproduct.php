<?php


namespace Product\Models;


use Illuminate\Database\Eloquent\Model;

class Catproduct extends Model
{
    protected $table='catproduct';
    protected $fillable = ['name','slug','parent','thumbnail','background','meta_title','meta_desc','sort_order','display','status','lang_code'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

    public function getProductCat(){
        return $this->hasMany(Product::class,'cat_id')
            ->where('status',1)->where('main_display',1);
    }

}

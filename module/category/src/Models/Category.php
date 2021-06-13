<?php


namespace Category\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name','slug','parent','description','thumbnail','sort_order','lang_code','status','meta_title','meta_desc'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

}

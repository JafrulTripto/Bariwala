<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Supplier
 *
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier query()
 * @mixin \Eloquent
 */
class Supplier extends Model
{
    //
    public function category(){
        return $this->belongsTo('App\Category');
    }
}

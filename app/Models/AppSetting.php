<?php

namespace App\Models;

use Carbon\Language;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\Intl\Currencies;
use Symfony\Component\Intl\Timezones;

class AppSetting extends Model
{
    use HasFactory;
    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $increminting = false;
    protected $fillable = ['name' , 'value'];

    public function scopeGroup(Builder $builder , $group)
    {
        if(!$group == null)
        {
            $builder->where('name' , "LIKE" , "%$group%");
        }
    }


    public function localeOptions()
    {

        return Lang::pluck('name' , 'code')->toArray();
    }

    public function timezoneOptions()
    {
        return Timezones::getNames();
    }

    public function currancyOptions()
    {
        foreach(Currencies::getNames() as $code => $name)
        {
            $currencies[$code]  =   "$code - $name" ;
        }
        return $currencies;
    }
}

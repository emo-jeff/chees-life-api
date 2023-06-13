<?php

namespace App\Models;

use App\Models\Base\District as BaseDistrict;
use App\Traits\Searchable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;

class District extends BaseDistrict implements TranslatableContract
{
    use Translatable, Searchable;

    public array $translatedAttributes = ['name'];
    public array $searchable = [
        'extra_charge', 'enable', 'translations.name'
    ];
    protected $fillable = [
        'sequence',
        'extra_charge',
        'enable'
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->sequence = District::max('sequence') + 1;
        });
    }

    public function scopeEnabled(Builder $query): void
    {
        $query->where('enable', 1);
    }

    public function scopeSequence(Builder $query): void
    {
        $query->orderByDesc('sequence');
    }
}

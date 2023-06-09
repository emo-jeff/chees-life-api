<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\ServiceDescription;
use App\Models\ServiceDetail;
use App\Models\ServiceTranslation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property int $id
 * @property int|null $category_id
 * @property int $sequence
 * @property string|null $slug
 * @property int $price
 * @property string|null $description_en
 * @property string|null $description_tc
 * @property string|null $detail_en
 * @property string|null $detail_tc
 * @property bool $hot
 * @property bool $enable
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Category|null $category
 * @property Collection|ServiceDescription[] $service_descriptions
 * @property Collection|ServiceDetail[] $service_details
 * @property Collection|ServiceTranslation[] $service_translations
 *
 * @package App\Models\Base
 */
class Service extends Model
{
    protected $table = 'services';

    protected $casts = [
        'category_id' => 'int',
        'sequence' => 'int',
        'price' => 'int',
        'hot' => 'bool',
        'enable' => 'bool'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service_descriptions()
    {
        return $this->hasMany(ServiceDescription::class);
    }

    public function service_details()
    {
        return $this->hasMany(ServiceDetail::class);
    }

    public function service_translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }
}

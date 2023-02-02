<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(static function (Model $model) {
            if (empty($model->slug)) {

                $count = $model->newQuery()->where('slug', 'like', str($model->{self::slugFrom()})->slug() . '%')->count();

                $model->slug = str($model->{self::slugFrom()})->slug() . ($count > 0 ? ('-' . $count) : '');
            } else {
                $model->slug = str($model->{self::slugFrom()})->slug();
            }
        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }
}

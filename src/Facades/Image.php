<?php

namespace Rsthegeek\LaravelInterventionImageV3\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Intervention\Image\ImageManager read(mixed $source)
 * @method static self configure(array $config)
 * @method static \Intervention\Image\ImageManager create(int $width, int $height)
 */
class Image extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'image';
    }
}

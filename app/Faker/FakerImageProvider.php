<?php

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

final class FakerImageProvider extends Base
{
    public function imageLorem(string $dir = '', int $with = 500, int $height = 500): string
    {
        $name = $dir . '/' . Str::random(6) . '.jpg';

        Storage::put(
            $name,
            file_get_contents("https://loremflickr.com/$with/$height")
        );

        return '/storage/' . $name;
    }

    public function imageLocal(string $dir = '', int $with = 1280, int $height = 1280): string
    {

        $random_image_path = collect(Storage::disk('fixtures')->allFiles('/images'))->random();
        $image = Image::make(Storage::disk('fixtures')->get($random_image_path))->encode('jpg');
        $name = $dir . '/' . Str::uuid()->toString() . '.jpg';


        if ($with !== 1280 || $height !== 1280) {
            $image->crop($with, $height);
        }

        Storage::put(
            $name,
            $image
        );

        return '/storage/' . $name;
    }

}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class ColorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('colorishex', function ($attribute, $value, $parameters, $validator) {
            $regexp = '/^#([A-Fa-f0-9]{6})$/is';

            return (bool) preg_match($regexp, $value);
        });
        Validator::extend('colorisnotblue', function ($attribute, $value, $parameters, $validator) {
            $regexp = '/^#([A-Fa-f0-9]{2})([A-Fa-f0-9]{2})([A-Fa-f0-9]{2})$/is';

            if(preg_match($regexp, $value, $rgb)) {
                $hsl = $this->rgbToHsl(hexdec($rgb[1]), hexdec($rgb[2]), hexdec($rgb[3]));

                if($hsl[0] > 180 && $hsl[0] < 300) {
                    return false;
                }
                return true;
            }
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * @param $r int Red color
     * @param $g int Green color
     * @param $b int Blue color
     * @return array
     */
    public function rgbToHsl( $r, $g, $b )
    {
        $r /= 255;
        $g /= 255;
        $b /= 255;

        $max = max( $r, $g, $b );
        $min = min( $r, $g, $b );
        $l = ( $max + $min ) / 2;
        $d = $max - $min;

        if( $d == 0 ) {
            $h = $s = 0;
        } else {
            $s = $d / ( 1 - abs( 2 * $l - 1 ) );
            switch( $max ) {
                case $r:
                    $h = 60 * fmod( ( ( $g - $b ) / $d ), 6 );
                    if ($b > $g) {
                        $h += 360;
                    }
                    break;
                case $g:
                    $h = 60 * ( ( $b - $r ) / $d + 2 );
                    break;
                case $b:
                    $h = 60 * ( ( $r - $g ) / $d + 4 );
                    break;
            }
        }
        return array( round( $h, 2 ), round( $s, 2 ), round( $l, 2 ) );
    }

    /**
     * @param $h int Hue
     * @param $s int Saturation
     * @param $l int Lightness
     * @return array
     */
    public function hslToRgb( $h, $s, $l ) {
        $c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
        $x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
        $m = $l - ( $c / 2 );

        if ( $h < 60 ) {
            $r = $c;
            $g = $x;
            $b = 0;
        } else if ( $h < 120 ) {
            $r = $x;
            $g = $c;
            $b = 0;
        } else if ( $h < 180 ) {
            $r = 0;
            $g = $c;
            $b = $x;
        } else if ( $h < 240 ) {
            $r = 0;
            $g = $x;
            $b = $c;
        } else if ( $h < 300 ) {
            $r = $x;
            $g = 0;
            $b = $c;
        } else {
            $r = $c;
            $g = 0;
            $b = $x;
        }
        $r = ( $r + $m ) * 255;
        $g = ( $g + $m ) * 255;
        $b = ( $b + $m  ) * 255;

        return array( floor( $r ), floor( $g ), floor( $b ) );
    }
}

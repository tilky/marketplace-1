<?php

namespace App;


use App\Observers\ImageObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Image model
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $original
 * @property array $sizes
 * @property array $available_sizes If null, all sizes will be created
 * @property bool $ready
 * @property int $width
 * @property int $height
 * @property int $order
 * @property int|null $offer_id
 * @property-read string[] $absolute_paths
 * @property-read string[] $all_sizes
 * @property-read string[] $urls
 * @property-read \App\Offer|null $offer
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image displayable()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereAvailableSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereReady($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereWidth($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    /**
     * Image storage location
     */
    const STORAGE_DIR = 'public'.DIRECTORY_SEPARATOR.'images';

    /**
     * Size definitions
     */
    const SIZES
        = [
            'tiny' => 24,
            'icon' => [40, 40],
            'icon_2x' => [80, 80],
            'thumbnail' => [400, 400],
        ];

    /**
     * Original size key name
     */
    const ORIGINAL_SIZE = 'original';

    /**
     * Max width/height in px
     */
    const ORIGINAL_SIZE_LIMIT = 1024;

    protected $casts
        = [
            'sizes' => 'array',
            'available_sizes' => 'array',
            'ready' => 'boolean',
        ];

    protected $fillable
        = [
            'sizes',
            'original',
            'ready',
            'width',
            'height',
            'offer_id',
            'available_sizes',
            'order',
        ];

    /**
     * @inheritDoc
     */
    protected static function boot()
    {
        parent::boot();

        self::observe(ImageObserver::class);

        self::addGlobalScope('ordered', function ($query) {
            /** @var Builder $query */
            return $query->orderBy('order');
        });
    }

    /**
     * Offer relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }


    /**
     * Profile image owner relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'profile_image_id');
    }

    /**
     * Return only images that can be displayed
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeDisplayable(Builder $query)
    {
        return $query->where('ready', true);
    }

    /**
     * Array combining `sizes` and `original`
     *
     * @return string[]
     */
    public function getAllSizesAttribute()
    {
        $sizes = $this->sizes ?: [];

        return [
                self::ORIGINAL_SIZE => $this->attributes['original'],
            ] + $sizes;
    }

    /**
     * Array of image URLs
     *
     * @return string[]
     */
    public function getUrlsAttribute()
    {
        $urls = $this->all_sizes;

        if ( ! $urls) {
            return $urls;
        }

        foreach ($urls as $key => $url) {
            if ( ! Str::startsWith($url, ['http://', 'https://'])) {
                $urls[$key] = \Storage::url($url);
            }
        }

        return $urls;
    }

    /**
     * Array of image absolute paths
     *
     * @return string[]
     */
    public function getAbsolutePathsAttribute()
    {
        $paths = $this->all_sizes;

        if ( ! $paths) {
            return $paths;
        }

        foreach ($paths as $key => $path) {
            if (Str::startsWith($path, ['http://', 'https://'])) {
                unset($paths[$key]);
            } else {
                $paths[$key] = \App::storagePath().DIRECTORY_SEPARATOR.'app'
                    .DIRECTORY_SEPARATOR.$path;
            }
        }

        return $paths;
    }
}
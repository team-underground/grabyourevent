<?php

namespace App;

use App\Tag;
use App\User;
use Carbon\Carbon;
use App\TicketCategory;
use App\Enums\CategoryType;
use Illuminate\Support\Str;
use JamesMills\Uuid\HasUuidTrait;
use Spatie\ResourceLinks\HasLinks;

class Event extends BaseModel
{
    use HasUuidTrait, HasLinks;

    protected $casts = [
        "what_is_included" => "array",
        "event_starting_date" => 'date',
        "event_ending_date" => 'date',
        "meta_keywords" => "array"
    ];

    protected $appends = ['event_image_path', 'event_image_orientation'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->event_slug = Str::slug($model->event_name); // change the ToBeSluggiefied

            $latestSlug =
                static::whereRaw("event_slug = '$model->event_slug' or event_slug LIKE '$model->event_slug-%'")
                ->latest('id')
                ->value('event_slug');

            if ($latestSlug) {
                $pieces = explode('-', $latestSlug);

                $number = intval(end($pieces));

                $model->event_slug .= '-' . ($number + 1);
            }
        });
    }

    public function getEventImagePathAttribute()
    {
        return $this->event_image ? url('/') . '/storage/' . $this->event_image : null;
    }

    public function getEventCategoryAttribute($value)
    {
        return CategoryType::getDescription($value);
    }

    public function getEventKeywordsAttribute()
    {
        return $this->tags->pluck('name')->toArray();
    }

    public function getEventImageOrientationAttribute()
    {
        list($width, $height) = getimagesize($this->event_image_path);
        if ($width > $height)
            return "landscape";
        else
            return "portrait";
    }

    public function getTicketPriceFormattedAttribute()
    {
        return money_format('&#8377; %!n', $this->lowest_price) . ' - ' . money_format('&#8377; %!n', $this->maximum_price);
    }

    public function dateFormat()
    {
        $date1 = $this->event_starting_date->timestamp;
        $date2 = $this->event_ending_date instanceof Carbon ? $this->event_ending_date->timestamp : null;
        //if date2 is null, return the format with first datetime
        if ($date2 == null) {
            return date('M d', $date1);
        }

        $year1 = date('Y', $date1);
        $year2 = date('Y', $date2);
        // if two years are not same
        if ($year1 != $year2) {
            return date('M d,Y', $date1) . " - " . date('d M,Y', $date2);
        }

        $month1 = date('m', $date1);
        $month2 = date('m', $date2);
        // if two months are not same
        if ($month1 != $month2) {
            return date('M d', $date1) . " - " . date('d M', $date2);
        }

        $firstDate = date('Y-m-d', $date1);
        $secondDate = date('Y-m-d', $date2);
        //if first date and second date are equal
        if ($firstDate === $secondDate) {
            return date('M d', $date1);
        }
    }

    public function timeFormat()
    {
        return date('h:i A', $this->event_starting_date->timestamp);
    }

    public function getLowestPriceAttribute()
    {
        $prices = $this->ticketcategories->filter(function ($item) {
            return !is_null($item->ticket_category_price);
        });

        return $prices->min('ticket_category_price');
    }

    public function getMaximumPriceAttribute()
    {
        $prices = $this->ticketcategories->filter(function ($item) {
            return !is_null($item->ticket_category_price);
        });

        return $prices->max('ticket_category_price');
    }

    public function isFree()
    {
        return $this->ticketcategories->sum('ticket_category_price') === 0;
    }

    public function scopeFeatured($query, $value)
    {
        return $query->where('is_featured', $value);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_starting_date', '>', Carbon::now());
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('event_published_at');
    }

    public function scopeClosed($query, $booleanValue = true)
    {
        if ($booleanValue === false) {
            // event is not finished yet
            $query->whereDate('event_ending_date', '>=', Carbon::now()->format('Y-m-d'));
        } else {
            $query->whereDate('event_ending_date', '<', Carbon::now()->format('Y-m-d'));
        }
    }

    public function attachTags($tags)
    {
        // detach all tags if we have earlier
        $this->tags()->detach();
        // attaching all the tags that is requested
        foreach ($tags as $key => $tag) {
            // dd($tag);
            $tagFound = Tag::where('name', 'like', '%' . $tag . '%')->first();
            if ($tagFound) {
                $this->tags()->attach($tagFound->id);
            } else {
                $this->tags()->create([
                    'name' => $tag
                ]);
            }
        }
    }

    public function generateTicketCategories($ticketCategories)
    {
        foreach ($ticketCategories as $key => $category) {
            $this->ticketcategories()->create(array_merge($category, [
                "uuid" => Str::uuid(),
            ]));
        }
    }

    public function ticketcategories()
    {
        return $this->hasMany(TicketCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function organiser()
    {
        return $this->belongsTo(User::class, 'organiser_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

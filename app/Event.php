<?php

namespace App;

use App\Tag;
use App\User;
use Carbon\Carbon;
use App\TicketCategory;
use App\Enums\CategoryType;
use Illuminate\Support\Str;
use App\Enums\EventStatusType;
use JamesMills\Uuid\HasUuidTrait;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Event extends BaseModel implements ViewableContract
{
    use HasUuidTrait, Viewable;
    protected $casts = [
        "what_is_included" => "array",
        "meta_keywords" => "array"
    ];

    protected $dates = [
        'event_published_at', "event_starting_date",  "event_ending_date"
    ];

    protected $appends = [
        'event_image_path',
        // 'event_image_orientation', 
        'event_published_at_formatted', 'event_keywords'
    ];

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

    // public function getEventImageOrientationAttribute()
    // {
    //     if ($this->event_image == null) {
    //         return 'no image found';
    //     }
    //     list($width, $height) = getimagesize($this->event_image_path);
    //     if ($width > $height)
    //         return "landscape";
    //     else
    //         return "portrait";
    // }

    public function getEventStatusAttribute($value)
    {
        return EventStatusType::getDescription($value);
    }

    public function getTicketPriceFormattedAttribute()
    {
        $lowestFormat = money_format('&#8377; %!n', $this->lowest_price);
        $maxFormat =  money_format('&#8377; %!n', $this->maximum_price);
        if ($lowestFormat == $maxFormat) {
            return $lowestFormat;
        }
        return $lowestFormat . ' - ' . $maxFormat;
    }

    public function dateFormat()
    {
        $date1 = $this->event_starting_date->timestamp;
        $date2 = $this->event_ending_date instanceof Carbon ? $this->event_ending_date->timestamp : null;
        // ddd($date1, $date2);
        //if date2 is null, return the format with first datetime
        if ($date2 == null) {
            return date('M d', $date1);
        }
        // ddd('here');
        $year1 = date('Y', $date1);
        $year2 = date('Y', $date2);
        // ddd($year1, $year2);
        // if two years are not same
        if ($year1 != $year2) {
            return date('M d,Y', $date1) . " - " . date('d M,Y', $date2);
        }

        $month1 = date('m', $date1);
        $month2 = date('m', $date2);
        // ddd($month1, $month2);

        // if two months are not same
        if ($month1 != $month2) {
            return date('M d', $date1) . " - " . date('d M', $date2);
        }

        $firstDate = date('Y-m-d', $date1);
        $secondDate = date('Y-m-d', $date2);
        // ddd($firstDate, $secondDate);
        //if first date and second date are equal
        if ($firstDate === $secondDate) {
            return date('M d', $date1);
        }
        return date('M d', $date1) . " - " . date('d M', $date2);
    }

    public function timeFormat()
    {
        return date('h:i A', $this->event_starting_date->timestamp);
    }

    public function getLowestPriceAttribute()
    {
        $prices = $this->ticketcategories->filter(function ($item) {
            return !is_null($item->ticket_category_price) && $item->ticket_category_price != 0;
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
        return $this->ticketcategories->sum('ticket_category_price') == 0;
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

    public function getEventPublishedAtFormattedAttribute()
    {
        // return (Carbon::today() == $value) ? Carbon::parse($value)->diffForHumans() : Carbon::parse($value)->format('j M, Y');
        // Carbon::parse($value)->toFormattedDateString(); // Dec 19, 2015
        if ($this->event_published_at == null) {
            return 'Not published yet';
        }
        $created = new Carbon($this->event_published_at);
        $now = Carbon::now();

        if ($created->diff($now)->days <= 1) {
            $difference = $created->diffForHumans(null, null, true);
        } else if ($created->diff($now)->days < 2) {
            $difference = 'Yesterday';
        } else if (in_array($created->diff($now)->days, [3, 4, 5, 6, 7])) {
            $difference = $created->diff($now)->days . ' days ago';
        } else {
            $difference = $created->toFormattedDateString();
        }

        return $difference;
    }

    public function scopeRole($query)
    {
        if (auth()->check()) {
            if (auth()->user()->type == 'Organiser') {
                $query->where('organiser_id', auth()->user()->id);
            }
        }
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('event_name', 'like', '%' . $search . '%')
                    ->orWhere('event_location', 'like', '%' . $search . '%');
            });
        })->when($filters['category'] ?? null, function ($query, $jobCategory) {
            $jobCategoryArray = explode(',', $jobCategory);

            $jobCategoryIds = collect($jobCategoryArray)->map(function ($j) {
                return CategoryType::getValue(Str::studly($j, ' '));
            });

            $query->whereIn('event_category', $jobCategoryIds);
        });
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

<?php

namespace App;

use Carbon\Carbon;
use App\TicketCategory;
use Illuminate\Support\Str;
use Spatie\ResourceLinks\HasLinks;

class Event extends BaseModel
{
    use HasLinks;

    protected $casts = [
        "what_is_included" => "array",
        "event_start_date" => 'date',
        "event_end_date" => 'date'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getTicketPriceFormattedAttribute()
    {
        return money_format('&#8377; %!n', $this->lowest_price) . ' - ' . money_format('&#8377; %!n', $this->maximum_price);
    }

    public function dateFormat()
    {
        $date1 = $this->event_start_date->timestamp;
        $date2 = $this->event_end_date instanceof Carbon ? $this->event_end_date->timestamp : null;
        //if date2 is null, return the format with first datetime
        if ($date2 == null) {
            return date('M d | h:iA', $date1);
        }

        $year1 = date('Y', $date1);
        $year2 = date('Y', $date2);
        // if two years are not same
        if ($year1 != $year2) {
            return date('M d,Y', $date1) . " - " . date('d M,Y', $date2) . date(' | h:iA', $date1);
        }

        $month1 = date('m', $date1);
        $month2 = date('m', $date2);
        // if two months are not same
        if ($month1 != $month2) {
            return date('M d', $date1) . " - " . date('d M', $date2) . date(' | h:iA', $date1);
        }

        $firstDate = date('Y-m-d', $date1);
        $secondDate = date('Y-m-d', $date2);
        //if first date and second date are equal
        if ($firstDate === $secondDate) {
            return date('M d | h:iA', $date1);
        }
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

    public function scopeisFeatured($query)
    {
        return $query->where('is_featured', 1)->get();
    }

    public function scopeisUpcoming($query)
    {
        return $query->where('event_start_date', '>', Carbon::now())->get();
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
}

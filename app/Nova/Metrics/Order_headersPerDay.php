<?php

namespace App\Nova\Metrics;

use App\Order_header;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;

class Order_headersPerDay extends Trend
{
    public function name()
    {
        return __('Orders Per Day');
    }

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByDays($request, Order_header::class, 'order_date')->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7 => '7 Days',
            14 => '14 Days',
            30 => '30 Days',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'order_headers-per-day';
    }
}

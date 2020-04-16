<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\DonateRequest;

class DonateRequestDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = DonateRequest::count();
        $string = trans_choice('Donate Request', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-droplet',
            'title'  => "{$count} {$string}",
            'text'   => __('Click button below to view all donate requests', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('View all donate requests'),
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
        //return Auth::user()->can('browse', Voyager::model('User'));
    }
}

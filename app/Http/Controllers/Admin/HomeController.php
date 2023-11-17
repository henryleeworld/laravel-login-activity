<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $number_blocks = [
            [
                'title' => '今天登入使用者數量',
                'number' => User::whereDate('last_login_at', today())->count()
            ],
            [
                'title' => '過去七天內登入使用者數量',
                'number' => User::whereDate('last_login_at', '>', today()->subDays(7))->count()
            ],
            [
                'title' => '過去三十天內登入使用者數量',
                'number' => User::whereDate('last_login_at', '>', today()->subDays(30))->count()
            ],
        ];

        $list_blocks = [
            [
                'title' => '上次登入使用者',
                'entries' => User::orderBy('last_login_at', 'desc')
                    ->take(5)
                    ->get(),
            ],
            [
                'title' => '過去三十天內未登入使用者',
                'entries' => User::where('last_login_at', '<', today()->subDays(30))
                    ->orwhere('last_login_at', null)
                    ->orderBy('last_login_at', 'desc')
                    ->take(5)
                    ->get()
            ],
        ];

        $chart_settings = [
            'chart_title'        => '每月使用者數量（Users）',
            'chart_type'         => 'line',
            'report_type'        => 'group_by_date',
            'model'              => 'App\\Models\\User',
            'group_by_field'     => 'last_login_at',
            'group_by_period'    => 'month',
            'aggregate_function' => 'count',
            'filter_field'       => 'last_login_at',
            'column_class'       => 'col-md-12',
            'entries_number'     => '5',
        ];
        $chart = new LaravelChart($chart_settings);

        return view('home', compact('number_blocks', 'list_blocks', 'chart'));
    }
}

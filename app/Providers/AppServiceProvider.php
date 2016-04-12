<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menuItems=[
            [
                "id" => "home",
                "name" => "首页",
            ],
            [
                "id" => "travelogue",
                "name" => "游记",
                "sub" => [
                    [
                        "id" => "cruise-logue",
                        "name" => "邮轮游记",
                    ], [
                        "id" => "non-cruise-logue",
                        "name" => "非邮轮游记",
                    ], 
                ],
            ],
            [
                "id" => "tips",
                "name" => "攻略",
            ],
            [
                "id" => "dest",
                "name" => "目的地",
            ],
            [
                "id" => "cruiser",
                "name" => "体验员",
            ],
            [
                "id" => "community",
                "name" => "社区",
            ],
        ];

        $searchCategories=[
            [
                "id" => "all",
                "name" => "全部",
            ],
            [
                "id" => "cruiser",
                "name" => "邮轮",
            ],
            [
                "id" => "travelogue",
                "name" => "游记",
            ],
            [
                "id" => "tips",
                "name" => "攻略",
            ],
        ];
        view()->share('menuItems', $menuItems);
        view()->share('searchCategories', $searchCategories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\menu;
use App\topnavs;
use Illuminate\Support\Facades\DB;
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

        view()->composer('topnav',function($view){
           $view->with('get_nav', topnavs::all()->where('static_menu','static'));
        });
    }

    /*// generate tree for teams
    private static function mapTree($dataset, $parent = 0)
    {
        $tree = array();

        foreach ($dataset as $id => $node)
        {
            if ($node->parent_id != $parent) continue;
            $node->children = self::mapTree($dataset, $node->id);
            $tree[$id] = $node;
        }

        return $tree;
    }

    private static function prepareMenu($tree)
    {
        $data = '<ul class="nav navbar-nav">';

        foreach ($tree as $item)
        {
            $data .= '<li><a href="' . $item->url . '">' . $item->title . '</a></li>';

            if (count($item->children) > 0)
            {
                $data .= self::prepareMenu($item->children);
            }
        }

        $data .= '</ul>';

        return $data;
    }

    public static function generateMenu()
    {
        $urls = menu::all();
        $tree = self::mapTree($urls);
        $data = self::prepareMenu($tree);

        return $data;
    }*/


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

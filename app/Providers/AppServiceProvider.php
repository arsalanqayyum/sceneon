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

    // generate tree for teams
    public function buildTree($elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $key => $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
   public function display_with_children($parentRow, $level = 0) {
        echo '<li>';
        ?>
        <div class="node__name"><?php echo (!empty($parentRow['name']) && isset($parentRow['name']))?$parentRow['name']:''; ?></div>
        <div class="node__designation"><?php echo (!empty($parentRow['designation']) && isset($parentRow['designation']))?$parentRow['designation']:''; ?></div>
        <?php
        if ( array_key_exists('children',$parentRow) ) {
            echo '<ul>';
            foreach($parentRow['children'] as $caa){
                display_with_children($caa, $level+1);
            }
            echo '</ul>';
        }
        echo '</li>';
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
     
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $all_cats=\App\Model\Admin\Category::where('parent_id',0)->where('status','=',1)->get();
        foreach ($all_cats as $key => $category) {
           $children_data = array();
           $children = \App\Model\Admin\Category::where('parent_id',$category['id'])->where('status','=',1)->get();
           foreach ($children as $child) {
                    
                    $children_data[] =(object) array(
                        'id'  => $child->id,
						'name'  => $child->name,
                        'seo_url'  => $child->seo_url,
						'image'  => $child->image
                    );
                }
            $all_cat[] =(object) array(
                    'id'     => $category->id,
					'name'     => $category->name,
                    'seo_url'     => $category->seo_url,
					'image'  => $child->image,
					'children' => $children_data
                );    


        }
       
              View::share('all_cat',$all_cat);
        
    }
}

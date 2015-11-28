<?php

namespace App\Providers;

use App\Article;
use App\Member;
use Illuminate\Console\Command;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('eloquent.saving*', function ($model) {
            if ($model instanceof Article) {
                $articles = Article::select('slug')->get();

                $slug = str_slug($model->title);
                $i = 0;

                do {
                    $flag = false;

                    foreach ($articles as $article) {
                        if ($article->slug == $slug) {
                            $flag = true;
                            $slug .= "-" . $i;
                            ++$i;
                        }
                    }
                } while ($flag);

                $model->slug = $slug;
            } else if ($model instanceof Member) {

            } else if ($model instanceof Command) {

            }
        });
    }
}

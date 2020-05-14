<?php

namespace App\Http\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\News;

class NewsComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $news;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(News $news)
    {
        // Dependencies automatically resolved by service container...
        $this->news = $news;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count1', '123-'.$this->news->count());    //xem them: https://www.youtube.com/watch?v=7QWZxjgvEQc
    }
}
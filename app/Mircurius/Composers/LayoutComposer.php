<?php namespace App\Mircurius\Composers;

class LayoutComposer
{
    public function compose($view)
    {
        $frontend_layout = config('frontend.view.layout', 'layout.frontend_layout');

        $view->with(compact('frontend_layout'));
    }
}

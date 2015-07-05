<?php namespace App\Mircurius\Composers;

class LayoutComposer
{
    public function compose($view)
    {
    	$layout = config('view.layout', 'layouts.master');

        $view->with(compact('layout'));
    }
}

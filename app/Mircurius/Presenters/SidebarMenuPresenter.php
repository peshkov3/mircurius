<?php
namespace App\Mircurius\Presenters;

use Pingpong\Menus\Presenters\Bootstrap\NavbarPresenter;

class SidebarMenuPresenter extends NavbarPresenter {

    /**
     * {@inheritdoc }
     */
    public function getOpenTagWrapper() {
    
       return PHP_EOL.'<div class="panel panel-default">'.PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getCloseTagWrapper() {
        
           return PHP_EOL.'</div>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithoutDropdownWrapper($item) {
        
        return PHP_EOL.'<div class="panel-heading"><h4 class="panel-title"><a href="'.$item->getUrl().'" '.$item->getAttributes().'>'.$item->getIcon().' '.$item->title.'</a></h4></div>'.PHP_EOL;
    }
    
    /**
     * {@inheritdoc }
     */
     public function getActiveState($item, $state = ' class="active"')
    {
        return $item->isActive() ? $state : null;
    }

    /**
     * {@inheritdoc }
     */
    public function getDividerWrapper() {
    }

    /**
     * {@inheritdoc }
     */
    public function getHeaderWrapper($item) {
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithDropDownWrapper($item) {
    }

    /**
     * {@inheritdoc }
     */
    public function getMultiLevelDropdownWrapper($item) {
    }



}

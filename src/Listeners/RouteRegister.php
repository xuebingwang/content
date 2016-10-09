<?php
/**
 * This file is part of Notadd.
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-10-08 18:30
 */
namespace Notadd\Content\Listeners;
use Notadd\Foundation\Routing\Abstracts\AbstractRouteRegister;
/**
 * Class RouteRegister
 * @package Notadd\Content\Listeners
 */
class RouteRegister extends AbstractRouteRegister {
    /**
     * @return void
     */
    public function handle() {
        $this->router->group([], function() {
        });
    }
}
<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-10-09 17:44
 */
namespace Notadd\Content\Events;

use Illuminate\Container\Container;
use Notadd\Content\Managers\CategoryManager;
use Notadd\Content\Templates\CategoryTemplate;

/**
 * Class RegisterCategoryTemplate.
 */
class RegisterCategoryTemplate
{
    /**
     * @var \Illuminate\Container\Container
     */
    protected $container;
    /**
     * @var \Notadd\Content\Managers\PageManager
     */
    protected $manager;

    /**
     * RegisterCategoryType constructor.
     *
     * @param \Illuminate\Container\Container          $container
     * @param \Notadd\Content\Managers\CategoryManager $manager
     */
    public function __construct(Container $container, CategoryManager $manager)
    {
        $this->container = $container;
        $this->manager = $manager;
    }

    /**
     * @param string                                     $name
     * @param \Notadd\Content\Templates\CategoryTemplate $template
     */
    public function registerTemplate($name, CategoryTemplate $template)
    {
        $this->manager->registerTemplate($name, $template);
    }
}

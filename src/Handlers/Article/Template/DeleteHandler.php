<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, notadd.com
 * @datetime 2016-11-25 15:14
 */
namespace Notadd\Content\Handlers\Article\Template;

use Illuminate\Container\Container;
use Notadd\Content\Models\ArticleTemplate;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class DeleteHandler.
 */
class DeleteHandler extends SetHandler
{
    /**
     * DeleteHandler constructor.
     *
     * @param \Notadd\Content\Models\ArticleTemplate $articleTemplate
     * @param \Illuminate\Container\Container        $container
     */
    public function __construct(
        ArticleTemplate $articleTemplate,
        Container $container
    ) {
        parent::__construct($container);
        $this->errors->push($this->translator->trans('content::article_template.delete.fail'));
        $this->messages->push($this->translator->trans('content::article_template.delete.success'));
        $this->model = $articleTemplate;
    }

    /**
     * Execute Handler.
     *
     * @return bool
     */
    public function execute()
    {
        $articleTemplate = $this->model->newQuery()->find($this->request->input('id'));
        if ($articleTemplate === null) {
            return false;
        }
        $articleTemplate->delete();

        return true;
    }
}

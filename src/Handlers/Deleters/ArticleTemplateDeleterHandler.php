<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-11-25 15:14
 */
namespace Notadd\Content\Handlers\Deleters;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Notadd\Content\Models\ArticleTemplate;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class ArticleTemplateDeleteHandler.
 */
class ArticleTemplateDeleterHandler extends SetHandler
{
    /**
     * @var \Notadd\Content\Models\ArticleTemplate
     */
    protected $articleTemplate;

    /**
     * ArticleTemplateDeleterHandler constructor.
     *
     * @param \Notadd\Content\Models\ArticleTemplate $articleTemplate
     * @param \Illuminate\Container\Container        $container
     * @param \Illuminate\Http\Request               $request
     * @param \Illuminate\Translation\Translator     $translator
     */
    public function __construct(
        ArticleTemplate $articleTemplate,
        Container $container,
        Request $request,
        Translator $translator
    ) {
        parent::__construct($container, $request, $translator);
        $this->articleTemplate = $articleTemplate;
    }

    /**
     * @return int
     */
    public function code()
    {
        return 200;
    }

    /**
     * @return array
     */
    public function errors()
    {
        return [
            $this->translator->trans(''),
        ];
    }

    /**
     * @return bool
     */
    public function execute()
    {
        $articleTemplate = $this->articleTemplate->newQuery()->find($this->request->input('id'));
        if ($articleTemplate === null) {
            return false;
        }
        $articleTemplate->delete();

        return true;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            $this->translator->trans(''),
        ];
    }
}

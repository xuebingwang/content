<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-15 14:47
 */
namespace Notadd\Content\Handlers\Page\Category;

use Illuminate\Container\Container;
use Illuminate\Validation\Rule;
use Notadd\Content\Models\PageCategory;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class EditHandler.
 */
class EditHandler extends SetHandler
{
    /**
     * EditHandler constructor.
     *
     * @param \Illuminate\Container\Container     $container
     * @param \Notadd\Content\Models\PageCategory $category
     */
    public function __construct(
        Container $container,
        PageCategory $category
    ) {
        parent::__construct($container);
        $this->errors->push($this->translator->trans('content::category.update.fail'));
        $this->messages->push($this->translator->trans('content::category.update.success'));
        $this->model = $category;
    }

    /**
     * Data for handler.
     *
     * @return array
     */
    public function data()
    {
        return $this->model->structure();
    }

    /**
     * Execute Handler.
     *
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function execute()
    {
        $this->validate($this->request, [
            'alias' => [
                'required',
                'regex:/^[a-zA-Z\pN_-]+$/u',
                Rule::unique('page_categories')->ignore($this->request->input('id'), 'id'),
            ],
            'title' => 'required',
        ], [
            'alias.required' => '必须填写分类别名',
            'alias.regex' => '分类别名只能包含英文字母、数字、破折号（ - ）以及下划线（ _ ）',
            'alias.unique' => '分类别名已被占用',
            'title.required' => '必须填写分类标题',
        ]);
        $category = $this->model->newQuery()->find($this->request->input('id'));
        $category->update([
            'title'            => $this->request->input('name'),
            'alias'            => $this->request->input('alias'),
            'description'      => $this->request->input('description'),
            'type'             => $this->request->input('type') ?: 'normal',
            'background_color' => $this->request->input('background_color'),
            'seo_title'        => $this->request->input('seo_title'),
            'seo_keyword'      => $this->request->input('seo_keyword'),
            'seo_description'  => $this->request->input('seo_description'),
            'background_image' => $this->request->input('background_image'),
            'top_image'        => $this->request->input('top_image'),
            'pagination'       => $this->request->input('pagination'),
            'enabled'          => $this->request->input('enabled'),
        ]);

        return true;
    }
}

<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-09 16:51
 */
namespace Notadd\Content\Handlers\Category;

use Illuminate\Container\Container;
use Notadd\Content\Models\Category;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class SortHandler.
 */
class SortHandler extends SetHandler
{
    /**
     * SortHandler constructor.
     *
     * @param \Notadd\Content\Models\Category $category
     * @param \Illuminate\Container\Container $container
     */
    public function __construct(
        Category $category,
        Container $container
    ) {
        parent::__construct($container);
        $this->errors->push($this->translator->trans('content::category.sort.fail'));
        $this->messages->push($this->translator->trans('content::category.sort.success'));
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
     */
    public function execute()
    {
        $data = collect($this->request->input('data'));
        $data->each(function ($item, $key) {
            $id = $item['id'];
            $category = $this->model->newQuery()->find($id);
            $category->update([
                'parent_id' => 0,
                'order_id'  => $key,
            ]);
            $children = collect($item['children']);
            if ($children->count()) {
                $children->each(function ($item, $key) use ($id) {
                    $parentId = $id;
                    $id = $item['id'];
                    $category = $this->model->newQuery()->find($id);
                    $category->update([
                        'parent_id' => $parentId,
                        'order_id'  => $key,
                    ]);
                    $children = collect($item['children']);
                    if ($children->count()) {
                        $children->each(function ($item, $key) use ($id) {
                            $parentId = $id;
                            $id = $item['id'];
                            $category = $this->model->newQuery()->find($id);
                            $category->update([
                                'parent_id' => $parentId,
                                'order_id'  => $key,
                            ]);
                        });
                    }
                });
            }
        });

        return true;
    }
}

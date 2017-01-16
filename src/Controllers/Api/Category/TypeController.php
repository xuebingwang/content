<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-11-28 20:21
 */
namespace Notadd\Content\Controllers\Api\Category;

use Notadd\Content\Handlers\Category\Type\CreatorHandler;
use Notadd\Content\Handlers\Category\Type\DeleterHandler;
use Notadd\Content\Handlers\Category\Type\EditorHandler;
use Notadd\Content\Handlers\Category\Type\FetcherHandler;
use Notadd\Content\Handlers\Category\Type\FinderHandler;
use Notadd\Foundation\Routing\Abstracts\Controller;

/**
 * Class CategoryTypeController.
 */
class TypeController extends Controller
{
    /**
     * Create handler.
     *
     * @param \Notadd\Content\Handlers\Category\Type\CreatorHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function create(CreatorHandler $handler)
    {
        $response = $handler->toResponse();

        return $response->generateHttpResponse();
    }

    /**
     * Delete handler.
     *
     * @param \Notadd\Content\Handlers\Category\Type\DeleterHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function delete(DeleterHandler $handler)
    {
        $response = $handler->toResponse();

        return $response->generateHttpResponse();
    }

    /**
     * Edit handler.
     *
     * @param \Notadd\Content\Handlers\Category\Type\EditorHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function edit(EditorHandler $handler)
    {
        $response = $handler->toResponse();

        return $response->generateHttpResponse();
    }

    /**
     * Fetch handler.
     *
     * @param \Notadd\Content\Handlers\Category\Type\FetcherHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function fetch(FetcherHandler $handler)
    {
        $response = $handler->toResponse();

        return $response->generateHttpResponse();
    }

    /**
     * Find handler.
     *
     * @param \Notadd\Content\Handlers\Category\Type\FinderHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse * @throws \Exception
     * @throws \Exception
     */
    public function find(FinderHandler $handler)
    {
        $response = $handler->toResponse();

        return $response->generateHttpResponse();
    }
}
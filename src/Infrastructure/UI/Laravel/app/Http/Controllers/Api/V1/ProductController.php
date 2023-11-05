<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\RemoveProductRequest;
use App\Http\Requests\Product\FindProductRequest;
use TechChallengeFIAP\Application\Product\Create\CreateProductRequest;
use TechChallengeFIAP\Application\Product\Create\CreateProductService;
use TechChallengeFIAP\Application\Product\Edit\EditProductRequest;
use TechChallengeFIAP\Application\Product\Edit\EditProductService;
use TechChallengeFIAP\Application\Product\Delete\DeleteProductRequest;
use TechChallengeFIAP\Application\Product\Delete\DeleteProductService;
use TechChallengeFIAP\Application\Product\View\ViewProductRequest;
use TechChallengeFIAP\Application\Product\View\ViewProductService;
use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class ProductController extends Controller
{
    private CreateProductService $service;

    private EditProductService $serviceEdit;

    private DeleteProductService $serviceDelete;

    private ViewProductService $serviceView;

    public function __construct(CreateProductService $service, EditProductService $serviceEdit, DeleteProductService $serviceDelete, ViewProductService $serviceView)
    {
        $this->service = $service;
        $this->serviceEdit = $serviceEdit;
        $this->serviceDelete = $serviceDelete;
        $this->serviceView = $serviceView;
    }

    public function store(ProductRequest $request)
    {
        try {
            $applicationRequest = (new CreateProductRequest())
                ->setName($request->get('name'))
                ->setPrice($request->get('price'))
                ->setCategory($request->get('category'))
                ->setDescription($request->get('description'))
                ->setImages($request->get('images'));

            $response = $this->service->execute($applicationRequest);

            return $this->response->created(null, $response);
        } catch (BaseException $exception) {
            $this->response->errorBadRequest($exception->getMessage());
        }
    }

    public function edit(ProductRequest $request)
    {
        try {
            $applicationRequest = (new EditProductRequest())
                ->setProductId($request->get('id'))
                ->setName($request->get('name'))
                ->setPrice($request->get('price'))
                ->setCategory($request->get('category'))
                ->setDescription($request->get('description'))
                ->setImages($request->get('images'));

            $response = $this->serviceEdit->execute($applicationRequest);

            return $this->response->created(null, $response);
        } catch (BaseException $exception) {
            $this->response->errorBadRequest($exception->getMessage());
        }
    }

    public function delete(RemoveProductRequest $request)
    {
        try {
            $applicationRequest = (new DeleteProductRequest())
                ->setProductId($request->get('id'));

            $response = $this->serviceDelete->execute($applicationRequest);

            return $this->response->created(null, $response);
        } catch (BaseException $exception) {
            $this->response->errorBadRequest($exception->getMessage());
        }
    }

    public function view(FindProductRequest $request)
    {
        $request = (new ViewProductRequest())
            ->setCategory($request->get('category'));

        $response = $this->serviceView->execute($request);

        return $this->response->created(null, $response);
    }
}

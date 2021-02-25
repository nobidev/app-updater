<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

/**
 * @package NobiDev\AppUpdater\Controllers
 */
abstract class UpdateController extends Controller
{
    abstract protected function getData(Request $request): array;

    public function index(Request $request): BaseResponse
    {
        return Response::json($this->getData($request));
    }
}

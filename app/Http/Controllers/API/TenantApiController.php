<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tenantresource;
use App\Services\TenantService;
use Illuminate\Http\Request;

class TenantApiController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index()
    {
        return Tenantresource::collection($this->tenantService->getAllTenant());
    }
}

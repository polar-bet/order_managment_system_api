<?php

namespace App\Http\Controllers\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Services\Role\RoleService;

class RoleController extends Controller
{
    public function __construct(private RoleService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoleResource::collection($this->service->index());
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(RoleRequest $request)
    // {
    //     return RoleResource::make($this->service->store($request));
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Role $role)
    // {
    //     return RoleResource::make($role);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(RoleRequest $request, Role $role)
    // {
    //     return RoleResource::make($this->service->update($request, $role));
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Role $role)
    // {
    //     $role->delete();

    //     return response()->noContent();
    // }
}

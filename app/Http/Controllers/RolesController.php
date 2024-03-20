<?php

namespace App\Http\Controllers;

use App\Http\Resources\PermissionsResource;
use App\Http\Resources\RolesResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $roles = RolesResource::collection(Role::with('permissions')->get());

        return Inertia::render(
            'Admin/Roles/RolesIndex',
            [
                'roles' => $roles,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Admin/Roles/RolesCreate'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Role::create($request->all());
        return to_route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::where('id', $id)->first();
        $role = new RolesResource($role);
        return Inertia::render('Admin/Roles/RolesEdit',[
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $role = Role::where('id', $id)->first();
        $role->update($request->all());

        if($request->permissions){
            $role->syncPermissions(array_keys($request->permissions));
        }

        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::where('id', $id)->first();
        $role->delete();
        return to_route('roles.index');
    }
}

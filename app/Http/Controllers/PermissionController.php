<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    
    public function index()
    {
        $permissions = Permission::all();
        $breadcrumbs = [
            ['url' => route('permissions.index'), 'label' => 'Permissions'],
        ];
        $data = [
            'title' => 'Permission List',
            'permissions' => $permissions,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('permissions.index', $data);
    }

    public function create()
    {
        $breadcrumbs = [
            ['url' => route('permissions.index'), 'label' => 'Permissions'],
            ['url' => route('permissions.create'), 'label' => 'Add Permissions'],
        ];

        $data = [
            'title' => 'Add Permissions',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('permissions.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
            'description' => 'nullable|string|max:255',
        ]);

        Permission::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $notification = [
            'title' => 'Success',
            'message' => 'Permission created successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('permissions.index')->with('notification', $notification);
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        $breadcrumbs = [
            ['url' => route('permissions.index'), 'label' => 'Permissions'],
            ['url' => route('permissions.show', $id), 'label' => 'View Permissions'],
        ];
        $data = [
            'title' => 'View Permission',
            'permission' => $permission,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('permissions.show', $data);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $breadcrumbs = [
            ['url' => route('permissions.index'), 'label' => 'Permissions'],
            ['url' => route('permissions.edit', $id), 'label' => 'Edit Permissions'],
        ];
        $data = [
            'title' => 'Edit Permission',
            'permission' => $permission,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('permissions.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
            'description' => 'nullable|string|max:255',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->name = $request->input('name');
        $permission->description = $request->input('description');

        $permission->save();

        $notification = [
            'title' => 'Success',
            'message' => 'Permission created successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('permissions.index')->with('notification', $notification);
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();

        return redirect()->route('permissions.index')
            ->with('success', 'Permission deleted successfully.');
    }
}

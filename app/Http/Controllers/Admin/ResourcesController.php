<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Resources;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        $resources = Resources::query()
            ->paginate(10);

        return view('admin.resources')->with('resources', $resources);
    }

    public function edit(Request $request, Resources $resources = Null)
    {
        if (is_null($resources)) {
            $resources = new Resources();
        }

        if ($request->isMethod('post')) {
            $this->createOrUpdate($request, $resources);
            return redirect()->route('admin.resources.index')->with('success', 'Источник новостей успешно изменён!');
        }
        return view('admin.resourcesCrud')->with('resource', $resources);
    }

    private function createOrUpdate (Request $request, Resources $resources = null) {

        if (!$resources) {
            $resources = new Resources();
        }
        $resources->fill($request->all());

        $resources->save();
    }

    public function delete(Resources $resources) {
        $resources->delete();
        return redirect()->route('admin.resources.index')->with('success', 'Источник новостей успешно удалён!');
    }


}

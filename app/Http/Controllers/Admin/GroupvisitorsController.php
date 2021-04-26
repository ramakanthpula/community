<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGroupvisitorRequest;
use App\Http\Requests\StoreGroupvisitorRequest;
use App\Http\Requests\UpdateGroupvisitorRequest;
use App\Models\Groupvisitor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupvisitorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('groupvisitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupvisitors = Groupvisitor::all();

        return view('admin.groupvisitors.index', compact('groupvisitors'));
    }

    public function create()
    {
        abort_if(Gate::denies('groupvisitor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.groupvisitors.create');
    }

    public function store(StoreGroupvisitorRequest $request)
    {
        $groupvisitor = Groupvisitor::create($request->all());

        return redirect()->route('admin.groupvisitors.index');
    }

    public function edit(Groupvisitor $groupvisitor)
    {
        abort_if(Gate::denies('groupvisitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.groupvisitors.edit', compact('groupvisitor'));
    }

    public function update(UpdateGroupvisitorRequest $request, Groupvisitor $groupvisitor)
    {
        $groupvisitor->update($request->all());

        return redirect()->route('admin.groupvisitors.index');
    }

    public function show(Groupvisitor $groupvisitor)
    {
        abort_if(Gate::denies('groupvisitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.groupvisitors.show', compact('groupvisitor'));
    }

    public function destroy(Groupvisitor $groupvisitor)
    {
        abort_if(Gate::denies('groupvisitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupvisitor->delete();

        return back();
    }

    public function massDestroy(MassDestroyGroupvisitorRequest $request)
    {
        Groupvisitor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

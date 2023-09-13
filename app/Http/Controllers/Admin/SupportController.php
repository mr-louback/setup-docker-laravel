<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\CreateSupportDTO;
use App\DTOs\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service)
    {
    }
    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index', compact('supports'));
    }
    public function show(string $id)
    {
        // $support = Support::find($id);
        // $support = Support::where('id',$id)->first();
        // $support = Support::where('id','=',$id)->first();
        // $support = Support::where('id','!=',$id)->first();
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }
    public function create()
    {
        return view('admin/supports/create');
    }
    public function store(StoreUpdateSupport $request, Support $support)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        return redirect()->route('supports.index');
    }
    public function edit(string $id)
    {
        // if (!$support = $support->where('id', $id)->first())
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        return view('admin/supports/edit', compact('support'));
    }
    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        if (!$support) {
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();
        // $support->update($request->validated());

        return redirect()->route('supports.index');
    }
    public function destroy(string  $id)
    {
        // if (!$support = Support::find($id)) {
        //     return back();
        // }
        // $support->delete();
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }
}

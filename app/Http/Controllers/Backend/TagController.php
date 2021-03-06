<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TagRequest;
use App\Models\Tag;
use Alert;
use Illuminate\Http\Request;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_tags,show_tags')) {
            return redirect('admin/index');
        }

        $tags = Tag::with('products')

        ->when(\request()->keyword !=null, function($query){
            $query->search(\request()->keyword);
        })
        ->when(\request()->status !=null, function($query){
            $query->whereStatus(\request()->status);
        })
        ->orderBy(\request()->sort_by ?? 'id' ,  \request()->order_by ?? 'desc')

        ->paginate(\request()->limit_by ?? 10);

        return view('backend.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_tags,create_tags')) {
            return redirect('admin/index');
        }

        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_tags,create_tags')) {
            return redirect('admin/index');
        }

        Tag::create($request->validated());

        Alert::success('Tag Created Successfully', 'Success Message');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_tags,display_tags')) {
            return redirect('admin/index');
        }

        return view('backend.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_tags,update_tags')) {
            return redirect('admin/index');
        }

        return view('backend.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_tags,update_tags')) {
            return redirect('admin/index');
        }

        $input['name']      = $request->name;
        $input['slug']      = null;
        $input['status']    = $request->status;

        $tag->update($input);

        Alert::success('Tag Updated Successfully', 'Success Message');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_tags,delete_tags')) {
            return redirect('admin/index');
        }

        $tag->delete();

        Alert::success('Tag Deleted Successfully', 'Success Message');
        return redirect()->route('admin.tags.index');

    }


    public function massDestroy(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $tag = Tag::findorfail($id);
            $tag->delete();
        }
        return response()->json([
            'error' => false,
        ], 200);

    }

    public function changeStatus(Request $request)
    {
        $tag = Tag::find($request->cat_id);
        $tag->status = $request->status;
        $tag->save();
        return response()->json(['success'=>'Status Change Successfully.']);
    }
}

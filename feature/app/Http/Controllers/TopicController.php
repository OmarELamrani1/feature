<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function topicOnlyTrashed(){
        $topics = Topic::onlyTrashed()->paginate(5);
        return view('topics.topicOnlyTrashed', compact('topics'));
    }

    // Restore topic deleted
    public function restoreTopic($id){
        $presidents = Topic::onlyTrashed()->where('id', $id)->first();
        $presidents->restore();
        return redirect()->back();
    }

    // Delete presidents definitely
    public function forceDeleteTopic($id){
        $presidents = Topic::onlyTrashed()->where('id', $id)->first();
        $presidents->forceDelete();
        return redirect()->back();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(TopicRequest $request)
    {
        Topic::create($request->validated());
        return redirect()->back()->with('topicSuccess', 'Topic added successfully.');
    }

    public function show(Topic $topic)
    {
        //
    }

    public function edit(Topic $topic)
    {
        //
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        Topic::findOrFail($topic->id)->update($request->validated());
        return redirect()->back()->with('topicUpdated', 'Topic updated successfully.');
    }

    public function destroy(Request $request, Topic $topic)
    {
        $topic = Topic::findOrFail($topic->id);
        $topic->delete($topic->id);
        return redirect()->back()->with('topicInfo', 'Topic deleted !');
    }
}

<?php

namespace App\Http\Controllers;

use App\ {
    Topic,
    Repositories\Contracts\TopicRepository,
    Repositories\Eloquent\Criteria\LatestFirst,
    Repositories\Eloquent\Criteria\ByUser,
    Repositories\Eloquent\Criteria\EagerLoad
};

use Illuminate\Http\Request;

class TopicController extends Controller
{

    protected $topics;

    public function __construct(TopicRepository $topics)
    {
        $this->middleware('auth');
        $this->topics = $topics;
    }

    /**
     * Get all topics 
     *
     * @return void
     */
    public function index()
    {
        $topics = $this->topics->withCriteria([
            new LatestFirst(),
            new EagerLoad(['posts', 'posts.user']),
        ])->all();
        return view('topics.index', compact('topics'));
    }

    public function show($slug)
    {    
        $topic = $this->topics->withCriteria([
            new EagerLoad(['posts.user']),
        ])->findBySlug($slug);
        

        return view('topics.show', compact('topic'));
    }
    /**
     * display of the topics add page
     *
     * @return void
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * create the new topic
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required|string']);

        $this->topics->create([
            'title' => $request->title,
            'slug' =>str_slug($request->title),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('topics.index');

    }

    public function edit($topic)
    {
        $topic = $this->topics->find($topic);

        return view('topics.edit', compact('topic'));
    }

    public function update($topic, Request $request)
    {
        $this->validate($request, ['title' => 'required|string']);

        $this->topics->update($topic, [
            'title' => $request->title,
            'slug' =>str_slug($request->title),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('topics.index');
       
    }

    public function destroy($topic)
    {
        $this->topics->delete($topic);
        return redirect()->route('topics.index');
    }

    public function myTopics()
    {
        $topics = $this->topics->withCriteria([
            new byUser(auth()->id()),
            new LatestFirst(),
        ])->all();

        return view('topics.my-topics', compact('topics'));
    }
}

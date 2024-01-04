<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Project;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $projects = Project::latest()->paginate(5);

        //render view with posts
        return view('project.index', compact('projects'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('project.create');
    }
 
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/project', $image->hashName());

        //create post
        Project::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('project.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $project = Project::findOrFail($id);

        //render view with post
        return view('project.show', compact('project'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $projects = Project::findOrFail($id);

        //render view with post
        return view('project.edit', compact('projects'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //get post by ID
        $project = Project::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/project', $image->hashName());

            //delete old image
            Storage::delete('public/project/'.$project->image);

            //update post with new image
            $project->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $project->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('project.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $project = Project::findOrFail($id);

        //delete image
        Storage::delete('public/project/'. $project->image);

        //delete post
        $project->delete();

        //redirect to index
        return redirect()->route('project.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
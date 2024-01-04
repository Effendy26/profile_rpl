<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Fasiliti;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class FasilitiController extends Controller
{    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $fasilitis = Fasiliti::latest()->paginate(5);

        //render view with posts
        return view('fasiliti.index', compact('fasilitis'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('fasiliti.create');
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
        $image->storeAs('public/fasiliti', $image->hashName());

        //create post
        Fasiliti::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('fasiliti.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $fasiliti = Fasiliti::findOrFail($id);

        //render view with post
        return view('fasiliti.show', compact('fasiliti'));
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
        $fasilitis = Fasiliti::findOrFail($id);

        //render view with post
        return view('fasiliti.edit', compact('fasiliti'));
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
        $fasiliti = Fasiliti::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/fasiliti', $image->hashName());

            //delete old image
            Storage::delete('public/fasiliti/'.$fasiliti->image);

            //update post with new image
            $fasiliti->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $fasiliti->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('fasiliti.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $fasiliti = Fasiliti::findOrFail($id);

        //delete image
        Storage::delete('public/fasiliti/'. $fasiliti->image);

        //delete post
        $fasiliti->delete();

        //redirect to index
        return redirect()->route('fasiliti.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
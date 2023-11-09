<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Fasilitas;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $fasilitass = Fasilitas::latest()->paginate(5);

        //render view with posts
        return view('fasilitas.index', compact('fasilitass'));
    }

    /**
     * index
     *
     * @return View
     */
    public function create(): View
    {
        return view('fasilitas.create');
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
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image

        //create post
        Fasilitas::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $fasilitas = Fasilitas::findOrFail($id);

        //render view with post
        return view('fasilitas.show', compact('fasilitas'));
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
        $fasilitas = Fasilitas::findOrFail($id);

        //render view with post
        return view('fasilitas.edit', compact('fasilitass'));
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
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //get post by ID
        $fasilitas = Fasilitas::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image

            //delete old image
            Storage::delete('public/fasilitas/'.$post->image);

            //update post with new image
            $fasilitas->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $fasilitas->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('fasilitas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
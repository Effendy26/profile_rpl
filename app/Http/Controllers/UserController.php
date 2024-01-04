<?php

namespace App\Http\Controllers;
use App\Models\Post;

use App\Models\Guru;

use App\Models\Fasilitas;

use App\Models\Posting;

use App\Models\Fasiliti;

use App\Models\Project;

use App\Models\Dokumen;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function  index(){
        $posts = Post::all();
        $gurus=  Guru::all();
        $fasilitass = Fasilitas::all();
        $postings = Posting::all();
        $fasilitis = Fasiliti::all();
        $projects = Project::all();
        $dokumens = Dokumen::all();
        return view('userHome',compact('posts','gurus','fasilitass','postings','fasilitis','projects','dokumens'));
 }
}

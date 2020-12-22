<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
 
    public function create()
  {
    return view('tags.create');
  }

  public function store(Request $request)
  {
    Tag::create($request->all());
    return redirect('/');
  }
}

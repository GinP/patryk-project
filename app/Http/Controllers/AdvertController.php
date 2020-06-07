<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\Adverts\StoreRequest;
use App\Http\Requests\Adverts\UpdateRequest;
use Auth;
use App\Advert;

class AdvertController extends Controller
{
    public function index()
    {
        $adverts = Advert::paginate(20);
        $categories = Category::all();
        foreach ($adverts as $advert)
        {
            $images[] = $advert->getMedia('file');
        }
        return view('adverts.index', compact('adverts'))->with(['categories' => $categories, 'images' => $images]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('adverts.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data += ['user_id' => Auth::id()];
        $advert = Advert::create($data);
        if($request->images != NULL)
        {
            foreach ($request->images as $image)
            {
                $advert->addMedia($image)->toMediaCollection('file');
            }
        }
        return redirect()->route('adverts.edit', ['advert' => $advert->id]);
    }

    public function show(Advert $advert)
    {
        $images = $advert->getMedia('file');
        return view('adverts.show', compact('advert'))->with('images', $images);
    }

    public function edit(Advert $advert)
    {
        $categories = Category::all();
        if ($advert->getOriginal('user_id') != Auth::user()->id) {
            return view('home');
        }
        else {
            $images = $advert->getMedia('file');
            return view('adverts.edit', compact('advert'))->with(['categories'=> $categories, 'images' => $images]);
        }

    }

    public function update(UpdateRequest $request, Advert $advert)
    {
        $advert->update($request->validated());
        return redirect()->route('users.adverts');
    }

    public function destroy(Advert $advert)
    {
        $advert->delete();
        return redirect()->route('users.adverts');
    }

    public function filter(Category $category)
    {
        $data['categories'] = Category::all();
        $data['adverts'] = $category->adverts()->paginate(20);
        return view('adverts.index', $data);
    }
}

<?php

namespace App\Http\Controllers;
use App\Category;
use Auth;
use App\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $adverts = Advert::all();
        $categories = Category::all();
        return view('adverts.index', compact('adverts'))->with('categories', $categories);
    }

    public function create()
    {
        $categories = Category::all();
        return view('adverts.create', compact('categories'));
    }

    public function store()
    {
        $data = $this->dataValidation();
        $data += ['user_id' => Auth::user()->id];
        $advert = Advert::create($data);
        return view('welcome');
    }

    public function show(Advert $advert)
    {
        return view('adverts.show', compact('advert'));
    }

    public function edit(Advert $advert)
    {
        $categories = Category::all();
        if ($advert->getOriginal('user_id') != Auth::user()->id)
        {
            return view('home');
        }else {
            return view('adverts.edit', compact('advert'))->with('categories', $categories);
        }

    }

    public function update(Advert $advert)
    {
        $advert->update($this->dataValidation());
        return redirect("/adverts/showyour");
    }

    public function destroy(Advert $advert)
    {
        $advert->delete();

        return redirect('/adverts');
    }
    public function showyour()
    {
        $adverts = Advert::all()->where('user_id','=', Auth::user()->id);
        return view('adverts.showyour', compact('adverts'));
    }
    public function filter(Category $category)
    {
        $categories = Category::all();
        $adverts = Advert::all()->where('category_id', '=', request()->id);
        return view('adverts.index', compact('adverts'))->with('categories', $categories);
    }

    protected function dataValidation()
    {
        $data = request()->validate([
            'title' => 'string|required|min:3',
            'description' => 'required|min:3|max:5000',
            'price' => 'required|numeric',
            'negotiation' => 'boolean',
            'category_id' => 'required|numeric'
        ]);
        return $data;
    }

}

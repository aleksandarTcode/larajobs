<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(Request $request)
    {
//        dd($request);
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);

    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $attributes['logo'] = $request->file('logo')->store('logos','public');
        }

        $attributes['user_id'] = auth()->id();

        Listing::create($attributes);

        return redirect('/')->with('message', 'Listing created successfully!');

    }

    public function edit(Listing $listing)
    {

        $this->auth_check($listing);

        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $this->auth_check($listing);

        $attributes = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $attributes['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($attributes);

        return back()->with('message', 'Listing updated successfully!');

    }

    public function destroy(Listing $listing)
    {

        $this->auth_check($listing);

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted!');
    }

    public function manage()
    {
        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);

    }

    protected function auth_check(Listing $listing)
    {
        if($listing->user_id != auth()->id())
        {
            abort(403, 'Unauthorized Action');
        }
    }
}


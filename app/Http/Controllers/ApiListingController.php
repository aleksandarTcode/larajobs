<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ApiListingController extends Controller
{
    public function index()
    {
        return Listing::all();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'user_id' => 'required',
                'company' => 'required|unique:listings,company',
                'location' => 'required',
                'website' => 'required',
                'email' => 'required|email',
                'tags' => 'required',
                'description' => 'required',
            ]);

            return Listing::create($request->all());
        }
        catch (\Exception $exception)
        {
            return $exception->getMessage();
        }
    }

    public function show(Listing $listing)
    {
        return $listing;
    }

    public function update(Request $request, Listing $listing)
    {

        return $listing->update($request->all());

    }

    public function destroy(Listing $listing)
    {
        return $listing->delete();
    }

    public function search($name)
    {
        return Listing::where('title', 'like', '%'. $name. '%')->orWhere('description', 'like', '%'. $name. '%')->orWhere('tags', 'like', '%'. $name. '%')->get();
    }
}

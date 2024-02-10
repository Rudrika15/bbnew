<?php

namespace App\Http\Controllers;

use App\Models\BrandPoints;
use App\Models\Category;
use App\Models\CategoryInfluencer;
use App\Models\InfluencerProfile;
use App\Models\Media;
use App\Models\Mymedia;
use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //


    function about()
    {
        return view('extra.otherpages.about');
    }
    function contact()
    {
        return view('extra.otherpages.contact');
    }
    function privacy()
    {
        return view('extra.otherpages.privacy');
    }
    function refund()
    {
        return view('extra.otherpages.refund');
    }
    function term()
    {
        return view('extra.otherpages.terms');
    }


    public function influencer(Request $request)
    {
        try {
            $influencers = User::whereHas('roles', function ($q) {
                $q->where('name', 'Influencer');
            })->whereHas('influencer')->get();
            $category = CategoryInfluencer::all();
            // $categoryNames = $request->category;
            $categoryNames = $request->category;
            if ($categoryNames) {
                // return "hii" . $categoryNames;
                $influencers = User::whereHas('roles', function ($q) {
                    $q->where('name', 'Influencer');
                })->whereHas('influencer', function ($q) use ($categoryNames) {
                    $q->whereJsonContains('categoryId', $categoryNames);
                })->get();
                // return "filtered" . $influencers;
            } else {

                $influencers = User::whereHas('roles', function ($q) {
                    $q->where('name', 'Influencer');
                })->with('influencer')->get();
                // return "none filtered";
            }
            return view('extra.influencer', \compact('influencers', 'category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function influencerProfileView($id)
    {
        try {
            $profile = InfluencerProfile::with('profile')
                ->with('incategory')
                ->where('userId', '=', $id)
                ->orderBy('id', 'DESC')
                ->first();
            $influencer = User::where('id', '=', $id)->with('influencerPackage')->with('card')->first();
            return view('influencerprofile', \compact('profile', 'influencer'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function brandStory()
    {
        try {
            $story = Story::orderBy('id', 'desc')->get();
            $stories = Story::all();

            $featured = Story::take(3)->get();
            $startup = Story::take(3)->get();
            $tech = Story::take(3)->get();
            $brand = Story::take(3)->get();
            $currentTime = Carbon::now();
            return view('layout.brandStory', \compact('story', 'stories', 'startup', 'currentTime'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function newHomepage()
    {
        $downloads = Mymedia::take(4)->get();
        $media = Media::take(1)->first();
        return view('layout.mainHomePage', \compact('downloads', 'media'));
    }

    public function fetchLayout(Request $request)
    {
        $selectedRole = $request->input('selectedRole');

        if ($selectedRole === 'Admin') {
            return view('admin.layouts.app');
        } elseif ($selectedRole === 'Designer') {
            return view('designer.layouts.app');
        } elseif ($selectedRole === 'Writer') {
            return view('writer.layouts.app');
        } elseif ($selectedRole === 'Brand') {
            return view('brand.layouts.app');
        } elseif ($selectedRole === 'Influencer') {
            return view('influencer.layouts.app');
        } elseif ($selectedRole === 'Reseller') {
            return view('reseller.layouts.app');
        } else {
            return view('user.layouts.app');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use App\Models\BrandOffer;
use App\Models\BrandPoints;
use App\Models\BrandWithCategory;
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
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
            return view('extra.influencerProfile', \compact('profile', 'influencer'));
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
    public function brandOffer()
    {
        $offerCategory = BrandCategory::take(9)->get();
        $brandLogos = User::whereHas('roles', function ($q) {
            $q->where('name', 'Brand');
        })->with('card')->get();
        return view('extra.brandOffer', compact('offerCategory', 'brandLogos'));
    }

    public function getOffer($categoryId)
    {
        // return  $brandLogos = User::whereHas('roles', function ($q) {
        //     $q->where('name', 'Brand');
        // })->get('id');
        $category = BrandCategory::find($categoryId);
        $offers = BrandWithCategory::where('brandcategoryId', $categoryId)
            ->with('brand.card.cardPortfolio')->with('offer')->get();
        return view('extra.brandOfferDetail', \compact('offers', 'category'));
    }

    public function brandDetail($id, $category)
    {
        $brandCategory = BrandCategory::find($category);
        $brand = User::where('id', $id)->with('card.cardPortfolio')->with('brand')->first();
        $offers = BrandOffer::where('userId', $id)->get();
        $recommendedOffers = BrandOffer::where('userId', $id)->take(3)->get();
        return view('extra.brandDetail', \compact('brand', 'brandCategory', 'offers'));
    }

    public function qrCode($offerId)
    {
        $offer = BrandOffer::find($offerId);
        $offerData = json_encode($offer);
        return QrCode::generate($offerData);
    }
}

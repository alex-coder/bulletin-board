<?php

    declare(strict_types = 1);

    namespace App\Http\Controllers;

    use App\Bulletin;
    use App\Http\Requests\StoreOfferRequest;
    use App\Offer;
    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Validator;

    class OffersController extends Controller
    {
        public function store(int $bulletin_id, StoreOfferRequest $request)
        {
            /** @var User $user */
            $user_id = Auth::id();
            if (!Offer::where(['user_id' => $user_id, 'bulletin_id' => $bulletin_id])->exists()) {
                $offer              = new Offer();
                $offer->title       = $request->input('title');
                $offer->description = $request->input('description');
                $offer->cost        = $request->input('cost');
                $offer->user_id     = $user_id;
                $offer->bulletin_id = $bulletin_id;
                $offer->save();
            }

            return redirect()->back();
        }

        public function apply($offer_id)
        {
            $offer    = Offer::find($offer_id);
            $bulletin = $offer->bulletin;
            $user     = Auth::user();

            if ($bulletin->user_id === $user->id) {
                $bulletin->status = Bulletin::STATUS_CLOSED;
                $bulletin->save();

                $bulletin->offers()->where('id', '!=', $offer_id)->update(['status' => Offer::STATUS_CANCELED]);

                $offer->status = Offer::STATUS_APPLIED;
                $offer->save();
            }

            return redirect()->back();
        }
    }

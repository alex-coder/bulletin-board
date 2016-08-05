<?php
    declare(strict_types = 1);

    namespace App\Http\Controllers;

    use App\Bulletin;
    use App\Constants\BulletinsConstants;
    use App\Http\Requests\StoreBulletinRequest;
    use App\User;
    use App\Utils\ImagesUtils;
    use App\Utils\StringUtils;
    use Illuminate\Support\Facades\Auth;

    class UsersBulletinsController extends BaseBulletinController
    {
        public function index(int $user_id = null)
        {
            $user = User::find($user_id);

            return view('bulletins.index', [
                'list' => $user->bulletins()->paginate(static::BULLETINS_PER_PAGE),
            ])->with('byUser', $user);
        }

        public function create()
        {
            return view('bulletins.create');
        }

        public function store(StoreBulletinRequest $request)
        {
            $bulletin = new Bulletin();

            $bulletin->title       = $request->input('title');
            $bulletin->description = $request->input('description');
            $bulletin->cost        = $request->input('cost');
            $bulletin->status      = BulletinsConstants::STATUS_ACTIVE;
            $bulletin->user_id     = Auth::id();

            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $filename = StringUtils::uuid() . '.' . $image->getClientOriginalExtension();

                $image->move(ImagesUtils::uploadPath(), $filename);
                $bulletin->image = $filename;
            } else if ($request->has('image_url')) {
                $bulletin->image = $request->input('image_url');
            }
            $bulletin->save();

            return redirect(route('bulletins.show', $bulletin));
        }
    }

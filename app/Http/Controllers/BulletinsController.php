<?php

    declare(strict_types = 1);

    namespace App\Http\Controllers;

    use App\Bulletin;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;

    class BulletinsController extends BaseBulletinController
    {
        public function index()
        {
            return view('bulletins.index', [
                'list' => Bulletin::active()->orderBy('created_at', 'desc')->paginate(static::BULLETINS_PER_PAGE),
            ]);
        }

        public function show(int $id)
        {
            return view('bulletins.show', [
                'user' => Auth::user(),
                'item' => Bulletin::find($id),
                'now'  => Carbon::now(),
            ]);
        }
    }

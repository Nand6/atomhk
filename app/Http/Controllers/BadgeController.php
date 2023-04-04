<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;

class BadgeController extends Controller
{
    public function index()
    {
        $badgesPerPage = 15;
        $page = request()->get('page', 1);

        $badgesPath = 'C:\inetpub\cdn\c_images\badges';
        $badges = File::glob("$badgesPath/*.gif");

        $badgesBasenames = array_map('basename', $badges);

        $totalPages = count($badgesBasenames);

        $badgesPaginated = new LengthAwarePaginator(
            array_slice($badgesBasenames, ($page - 1) * $badgesPerPage, $badgesPerPage),
            $totalPages,
            $badgesPerPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('badges.index', ['badges' => $badgesPaginated]);
    }

    public function create()
    {
        return view('badges.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gifFile' => 'required|file|image|mimes:gif',
            'code' => 'required',
        ]);

        $gifFile = $request->file('gifFile');

        $gifPath = 'C:\inetpub\cdn\c_images\badges' . $request->code;

        $gifFile->storeAs($gifPath, '');

        return redirect()->back()->with('success', 'GIF file uploaded successfully.');
    }
}

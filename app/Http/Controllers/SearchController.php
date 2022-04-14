<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SearchRepositoryInterface;
use App\Models\Product;

class SearchController extends Controller
{
    private SearchRepositoryInterface $searchRepository;

    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {
        if ($request->has('question')) {
            $searched = $this->searchRepository->search($request['question']);
            if ($request->filled('sort') && $searched->isNotEmpty()) {
                $filtered = $this->searchRepository->filter($searched, $request['sort']);
            } elseif ($searched->isNotEmpty()) {
                $filtered = $this->searchRepository->filter($searched, 'abc');
            } else {
                return response(['answer' => 'Notthing was found ... =('], 404);
            }
            return response()->json(['answer' => $filtered], 200);
        }
        return response(['answer' => 'Notthing was found ... =('], 404);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Bank;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.search_branch');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('projects.create_branch', compact('banks'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'bank_id' => ['required'],
            'name' => ['required'],
            'ifsc' => ['required'],
            'address' => ['required']
        ]);
        Branch::create($attributes);
        return redirect('/branches/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $id = request('search');
        $results = null;
        $ifsc_results = Branch::where('ifsc', 'like', $id)->get();
        if ($ifsc_results->count()) {
            $results = $ifsc_results;
        } else {
            $query_element='%';
            foreach(str_split($id) as $letter) {
                $query_element .= $letter.'%';
            }
//            dd($query_element);
            $query_results = Branch::where('name', 'like', $query_element)->get();
            $results = $query_results;
        }
//        return $results;
        return view('projects.search_branch', compact('results'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

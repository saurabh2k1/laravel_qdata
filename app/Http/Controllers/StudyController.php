<?php

namespace App\Http\Controllers;

use App\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = Study::latest()->paginate(5);

        return view('studies.index', compact('studies'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'bail|required|unique:studies|max:10', 
            'name' => 'required|max:255', 
            
        ]);
        // if ($request->user()->can('create-tasks')) {
        //     //Code goes here
        // }

        Study::create($request->all());

        return redirect()->route('studies.index')
            ->with('success', 'Study created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        return view('studies.show', compact('study'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Study $study)
    {
        return view('studies.edit', compact('study'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $study)
    {
        $request->validate([
            'code' => 'bail|required|max:10', 
            'name' => 'required|max:255', 
            
        ]);
        // if ($request->user()->can('create-tasks')) {
        //     //Code goes here
        // }

        $study->update($request->all());

        return redirect()->route('studies.index')
            ->with('success', 'Study updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        $study->delete();

        return redirect()->route('studies.index')
            ->with('success', 'Study  deleted successfully');
    }
}

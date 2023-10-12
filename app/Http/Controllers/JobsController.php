<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\JobRequest;
use App\Http\Resources\JobsResource;
use App\Http\Resources\CategoriesResource;

class JobsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = JobCategory::all();
        $query = Job::query();


        // Filter by search term
        if ($request->has('searchTerm')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->input('searchTerm') . '%')
                    ->orWhere('description', 'like', '%' . $request->input('searchTerm') . '%');
            });
        }

        // Filter by location
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        if($request->has('category')){
            $query->where('category_id', $request->input('category'));
        }
    // Retrieve the filtered jobs
    $jobs = $query->get();


        return [
            'jobs' => JobsResource::collection($jobs),
            'categories' => CategoriesResource::collection($categories),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
         $job = Job::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'description' => $request->description ,
                'pay' => $request->pay,
                'experience_id' => $request->experience_id,
                'category_id' => $request->category_id,
                'location' => $request->location,
                'job_type_id' => $request->job_type_id,
         ]);

        if($job){
            $data = new JobsResource($job);
            return $this->success($data, 'Job created Successfully', 200);
        } else{
            return $this->error('', 'Job creation failed', 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\CompanyProfile;
use App\Http\Requests\CompanyProfileRequest;
use App\Http\Resources\CompanyProfileResource;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HttpResponses;

    public function index()
    {
        //this is the index method.
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
         // Fetch the user's company profile
         $companyProfile = CompanyProfile::where('user_id', $id)->first();

         if ($companyProfile) {
            $data = new CompanyProfileResource($companyProfile);
             return $this->success($data, 'Request Successful', 200);
         } else {
             return $this->error('', 'There is no profile for the requested user', 404);
         }
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
    public function update(CompanyProfileRequest $request, string $id)
    {
        

        $companyProfile = CompanyProfile::find($id);

        if (!$companyProfile) {
            return response()->json(['message' => 'Company profile not found'], 404);
        }

         // Update the company profile with the validated data
         $companyProfile->update($request->all());

         // Return the updated company profile as a resource
         return new CompanyProfileResource($companyProfile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

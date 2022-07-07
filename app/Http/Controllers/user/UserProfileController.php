<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.user-profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $validateData = $request->validate([
            'ktp_image' => ['image', 'file', 'max:2048'],
            'ktp_nik' => ['required', 'unique:user_profiles'],
            'pekerjaan' => ['required'],
            'no_telp' => ['required', 'min:8'],
            'avatar' => ['image', 'file', 'max:2048'],
        ]);

        if ($request->file('ktp_image')) {
            $file = $request->file('ktp_image');
            $imageName = time() . '.' . $request->file('ktp_image')->getClientOriginalExtension();
            $destinationPath = public_path() . '/ktp-image';
            $file->move($destinationPath, $imageName);

            $validateData['ktp_image'] = $imageName;
        }

        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $imageName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $destinationPath = public_path() . '/avatar';
            $file->move($destinationPath, $imageName);

            $validateData['avatar'] = $imageName;
        }

        $validateData['user_id'] = auth()->user()->id;

        UserProfile::create($validateData);
        return redirect()->route('user.dashboard.index')->with('success', 'Data Diri Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        return view('user.profile.index', [
            'usersProfiles' => $userProfile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}

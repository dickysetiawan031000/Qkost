<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('dashboardMiddleware');
    }
    public function index()
    {
        $user = User::with('user_profile')->where('id', auth()->user()->id)->first();
        // dd($user);
        return view('user.user-profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.user-profile.create');
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
        return view('user.user-profile.edit', [
            'userProfile' => $userProfile
        ]);
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
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'password' => ['required', 'min:8', 'max:255'],
            'ktp_image' => ['image', 'file', 'max:2048'],
            'pekerjaan' => ['required'],
            'no_telp' => ['required', 'min:8'],
            'avatar' => ['image', 'file', 'max:2048'],
        ]);


        if ($request->ktp_nik != $userProfile->ktp_nik) {
            $request->validate([
                'ktp_nik' =>  ['required', 'unique:user_profiles']
            ]);
        };
        if ($request->email != $userProfile->user->email) {
            $request->validate([
                'email' =>  ['required', 'max:255', 'min:3', 'email', 'unique:users']
            ]);
        };


        if ($request->file('ktp_image')) {
            if ($request->oldImageKtp) {
                Storage::delete($request->oldImageKtp);
            }
            $file = $request->file('ktp_image');
            $imageName = time() . '.' . $request->file('ktp_image')->getClientOriginalExtension();
            $destinationPath = public_path() . '/ktp-image';
            $file->move(
                $destinationPath,
                $imageName
            );

            $request['ktp_image'] = $imageName;
        }

        if ($request->file('avatar')) {
            if ($request->oldImageAvatar) {
                Storage::delete($request->oldImageAvatar);
            }
            $file = $request->file('avatar');
            $imageName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $destinationPath = public_path() . '/avatar';
            $file->move(
                $destinationPath,
                $imageName
            );

            $request['ktp_image'] = $imageName;
        }
        $userProfile->update([
            'pekerjaan' => $request->pekerjaan,
            'no_telp' => $request->no_telp,
            'ktp_nik' => $request->ktp_nik,

        ]);

        $userProfile->user()->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);
        $request['password'] = Hash::make($request->password);



        return redirect()->route('user.user-profile.index')->with('success', 'Data diri berhasil diubah !');
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

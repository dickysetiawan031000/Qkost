<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test = User::with('user_profile')->get();
        // dd($test);
        return view('admin.user.index', [
            'users' => User::where('role', 2)->get()
        ]);
    }

    public function accepted($id)
    {
        $user = User::where('id', $id)->first();
        // dd($user);

        if ($user->status == 'Menunggu Verifikasi' || $user->status == 'tidak aktif') {

            User::where('id', $id)->update(['status' => 'aktif']);
            return redirect()->route('admin.user.index')->with('accept', 'User berhasil diaktifkan!');
        } else if ($user->status == 'aktif') {
            return redirect()->route('admin.user.index')->with('allreadyactive', 'User sudah aktif!');
        }
    }

    public function rejected($id)
    {
        $user = User::where('id', $id)->first();
        // dd($user);

        if ($user->status == 'Menunggu Verifikasi' || $user->status == 'aktif') {

            User::where('id', $id)->update(['status' => 'tidak aktif']);
            return redirect()->route('admin.user.index')->with('reject', 'User berhasil ditolak atau di non-aktifkan!');
        } else if ($user->status == 'tidak aktif') {
            return redirect()->route('admin.user.index')->with('allreadyreject', 'User sudah ditolak atau di non-aktifkan!');
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.detail', [
            'users' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserProfile $userProfile)
    {
        $rulesUser = [
            'nama' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
        ];

        $rulesProfile = [
            'pekerjaan' => ['required', 'max:255'],
            'no_telp' => ['required', 'max:255'],
            'ktp_nik' => ['required', 'max:255'],
        ];

        $validatedData1 = $request->validate($rulesUser);
        $validatedData2 = $request->validate($rulesProfile);

        User::where('id', $user->id)
            ->update($validatedData1);

        UserProfile::where('id', $userProfile->id)
            ->update($validatedData2);

        return redirect()->route('admin.user.index')->with('success', 'Data User telah berhasil diubah !');
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

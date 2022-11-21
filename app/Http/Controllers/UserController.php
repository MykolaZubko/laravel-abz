<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Position;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function Tinify\fromFile;
use function Tinify\setKey;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(6);


        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getToken(Request $request){
        $token = $request->user()->createToken('test');
        return [
            'success' => true,
            'token' => $token->plainTextToken
        ];

    }

    public function create()
    {
        $position = Position::all();

        return view('create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        setKey(config('app.test'));

        $data = $request->validated();


        $file = $request->file('photo');
        $path = $file->store('public/media');

        $data['photo'] = $path;

        $source = fromFile('storage/media/' . str_replace('public/media', '', $path));
        $resized = $source->resize(array(
            "method" => "fit",
            "width" => 70,
            "height" => 70
        ));
        $resized->toFile( 'storage/'  . str_replace('public/media', '', $path));

        User::create($data);

       return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
//        dd($user);
        $position = DB::table('positions')->where('id', $user->position_id)->first();

        return view('user', ['user' => $user, 'position' => $position]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */

    public function positions(){
        $positions = Position::all();

        if (!$positions){
            $pos['success'] = false;
            $pos['message'] = 'Page not found';

            return $pos;
        }

        foreach ($positions as $position){
            $pos['success'] = true;
            $pos['positions'][] = [
                    'id' => $position->id,
                    'name' => $position->positions,
            ];
        }


        return $pos;

    }

    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}

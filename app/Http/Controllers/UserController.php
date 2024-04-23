<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        if ($request->session()->exists('counter')) {
            $request->session()->increment('counter');
        } elseif (!$request->session()->exists('timeUserEntry')) {
            $request->session()->put('timeUserEntry', date('H:i:s'));
        } else {
            $request->session()->put('counter', 1);
        }

        session(['array' => 5]);

        dump($request->cookie('counter'));


//        session()->push('array', 6);

//        $request->session()->flush();


        $users = User::with('city')->paginate(3);
        $usersCollection = (new UserCollection($users))
            ->toResponse(request())
            ->getData(true);

        return view('user.index', ['users' => $usersCollection, 'paginator' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(UserRequest $request): RedirectResponse
    {

        $this->service->storeUser($request->all());
        return redirect()->route('users.all');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View|RedirectResponse|Response
    {

//        if ($id > 0 and $id <=10){
//            return redirect()->route('users.index');
//        }

//        return redirect()->action([UserController::class, 'index']);
//        return redirect()->route('users.edit', ['user' => $id]);

//        dump(session()->all());
//        dump(session()->exists('counter'));

        $counter = request()->cookie('counter');

//        if(!request()->session()->exists('key')){
//            request()->session()->flash('key', 'success');
//        }
//
//        request()->session()->reflash();

        request()->session()->keep(['username', 'email']);
        request()->session()->now('status', 'Task was successful!');

        dd(request()->session()->all());

        if (!isset($counter)) {
            $counter = 1;
        } else {
            $counter++;
        }
        Cookie::queue('name', 'value', 10);

        UserResource::withoutWrapping();
        $userResource = (new UserResource(User::findOrFail($id)->load('city')))
            ->toResponse(request())
            ->getData();

//        return response()->view('user.show', ['user' => $userResource])->withHeaders([
//            'Content-Type' => 'text/plain',
//            'X-Header-One' => '45',
//            'X-Header-Two' => '46',
//        ])->cookie('counter', $counter);

        return view('user.show', ['user' => $userResource]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        return view('user.create', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $user = $this->service->updateUser($request, $id);
        return redirect()->route('users.show', [$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = $this->service->deleteUser($id);
        return redirect()->route('users.index');
    }
}

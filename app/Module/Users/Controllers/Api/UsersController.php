<?php

declare(strict_types=1);


namespace App\Module\Users\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Users\Repositories\Contracts\UserRepositoryInterface;
use App\Module\Users\Models\User;
use App\Module\Users\Requests\AuthenticateUserRequest;
use App\Module\Users\Requests\CreateUserRequest;
use App\Module\Users\Requests\UpdateUserRequest;
use App\Module\Users\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

final class UsersController extends Controller
{
    protected $userService;
    protected $userRepository;

    public function __construct(UserServiceInterface $userService, UserRepositoryInterface $userRepository)
    {
        $this->userService    = $userService;
        $this->userRepository = $userRepository;
    }

    public function store(CreateUserRequest $request)
    {
        $user           = new User();
        $user->name     = $request->input('name');
        $user->surname  = $request->input('surname');
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address  = $request->input('address');
        $user->phone    = $request->input('phone');
        $this->userRepository->create($user);

        return redirect('/login');
    }

    public function update(int $id, UpdateUserRequest $request)
    {
        $user           = $this->userService->getById($id);
        $user->name     = $request->input('name');
        $user->surname  = $request->input('surname');
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address  = $request->input('address');
        $user->phone    = $request->input('phone');

        $this->userRepository->create($user);

        return redirect('/login');
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view('user.index', ['users' => $users]);
    }

    public function show(int $id)
    {
        $user = $this->userService->getById($id);
        return view('user.update', ['user' => $user]);
    }

    public function main()
    {
        session_start();
        return view('index');
    }

    public function authenticate(AuthenticateUserRequest $request)
    {
        session_start();

        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            $_SESSION["role"] = Auth::user()->role;
            $_SESSION["id"]   = Auth::user()->id;
            return redirect()->route('users.main');
        }  else {
            $_SESSION['error'] = 'Введены неправильная почта или пароль.';
            return redirect()->back();
        }
    }

    public function destroy(int $id)
    {
        session_start();

        $this->userRepository->delete($id);

        $_SESSION['success'] = 'Успешно';
        return redirect()->route('user.index');
    }
}

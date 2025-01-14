<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function allUsers(){
        return $this->userRepository->allUsers();
    }

    public function addUser(){
        return $this->userRepository->addUser();
    }

    public function storeUser(UserRequest $request){
        return $this->userRepository->storeUser($request);
    }

    public function deleteUser($id){
        return $this->userRepository->deleteUser($id);
    }
    public function editUser($id){
        return $this->userRepository->editUser($id);
    }

    public function updateUser(Request $request){
        return $this->userRepository->updateUser($request);
    }
}

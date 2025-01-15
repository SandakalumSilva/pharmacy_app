<?php 
namespace App\Interfaces;

interface UserInterface{
    public function allUsers();
    public function addUser();
    public function storeUser($request);
    public function deleteUser($id);
    public function editUser($id);
    public function updateUser($request);
    public function profileUser($id);
    public function changePassword($id);
    public function updatePassword($request);
}
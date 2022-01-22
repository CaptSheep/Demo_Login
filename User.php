<?php
include_once "user.json";
class User
{
    public $user;
    public string $dataPatch;

    public function __construct()
    {
        $this->dataPatch = "user.json";
        $this->user = $this->loadData();
    }

    public function loadData()
    {
        $dataJson = file_get_contents($this->dataPatch);
        return json_decode($dataJson);
    }

    public function saveData()
    {
        $this->user[] = $_REQUEST;
        $dataJson = file_put_contents($this->dataPatch,"user.json");
        return json_encode($dataJson);
    }

    public function login($request)
    {
        $email = $request["email"];
        $password = $request["password"];
        foreach ($this->user as $user){
            if($user->email == $email){
                if ($user->password == $password){
                    header("location:index.php");
                }
            }
        }
    }

    public function register()
    {
        foreach ($this->user as $user){
            if ( $user == $user->login()){
                return " Tai khoan da co nguoi dang ki, moi ban nhap lai";
            }
        }
    }


}
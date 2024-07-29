<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Shield\Entities\User;

class Users extends BaseController
{
    private UserModel $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function index()
    {
        helper("admin");

        $users = $this->model->orderBy("created_at")->paginate();
        return view("Admin\Views\Users\index", [
            "users" => $users,
            "pager" => $this->model->pager
        ]);
    }
    public function show($id)
    {
        $user = $this->getUser0or404($id);

        return view("Admin\Views\Users\show", ["user" => $user]);
    }
    private function getUser0or404($id): User
    {
        $user = $this->model->find($id);
        if ($user === null) {
            throw new PageNotFoundException("User with id $id not found");
        }
        return $user;
    }

    public function toggleBan($id){
        $user= $this->getUser0or404($id);
        if($user->isBanned()){
            $user->unBan();
        }
        else{
            $user->ban();
        }
        return redirect()->back()
            ->with("message","User Saved.");
    }
    public function groups($id){
        $user = $this->getUser0or404($id);
        if($this->request->is("post")){
            $groups=$this->request->getPost("groups")??[];
            $user->syncGroups(...$groups);
            return redirect()->to("admin/users/$id")
            ->with("message","User Saved");
        }
        return view("Admin\Views\Users\groups", ["user"=> $user]);
    }
    public function permissions($id){
        $user = $this->getUser0or404($id);
        if($this->request->is("post")){
            $permissions=$this->request->getPost("permissions")??[];
            $user->syncPermissions(...$permissions);
            return redirect()->to("admin/users/$id")
            ->with("message","User Saved");
        }
        return view("Admin\Views\Users\permissions", ["user"=> $user]);
    }
}

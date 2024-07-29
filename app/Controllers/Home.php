<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(session("magicLogin")){
            return redirect()->to("set-password")
            ->with("message","Please update your password");

        }
        return view("Home/index");
    }

    private function sendTestEmail()
    {
        $email = \config\Services::email();

        $email->setTo("harshpawar333@gmail.com");
        $email->setSubject("Test Email");
        $email->setMessage("Hello from <i>Code</i>");

        if ($email->send()) {
            echo "Email send";
        } else {
            echo "email not send";
        }
    }
}

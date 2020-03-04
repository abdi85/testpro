<?php

class AboutController
{

    public function index()
    {
        $appName = "Social Post Share";
        return Helper::view("about", ['appName' => $appName]);
    }

}

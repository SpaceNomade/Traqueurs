<?php

namespace App\Controller;

use App\Model\PersonnageModel;

class HomeController extends Controller {

    public function show(){
        $persos = PersonnageModel::getPersos();

        $this->render('home', compact('persos'));
    }
}
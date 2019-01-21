<?php

namespace App\Controller;

use App\Model\PersonnageModel;

class PersoController extends Controller {

    public function show($id){
        $perso = PersonnageModel::getPersoById($id);

        $this->render('perso', compact('perso'));
    }
}
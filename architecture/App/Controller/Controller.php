<?php
namespace App\Controller;

class Controller {
    private $path = ROOT.'/App/View/';
    private $template = ROOT.'/App/View/template/default.php';

    /**
     * @param view le nom de la vue sans l'extension String
     * @param data tableau de donnée pour la vue
     */
    protected function render(String $view, Array $data){
        ob_start();
        extract($data);
        require $this->path.$view.'.php';
        $content = ob_get_clean();
        require $this->template;
    }
}
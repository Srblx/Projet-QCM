<?php


abstract class Controller
{
    //* Méthode abstraite pour l'action par défaut
    abstract public function action_default();

    //* Constructeur qui appelle l'action correspondante en fonction de l'URL
    public function __construct()
    {
        if (isset($_GET['action']) and method_exists($this, "action_".$_GET['action']))
        {
            $action="action_".$_GET['action'];
            $this->$action();
        }
        else
        {
            $this->action_default();
        }
    }

    //* Méthode protégée pour afficher une vue avec des données
    protected function render ($vue,$data=[])
    {
        extract($data);
        $file_name="Views/view_".$vue.".php";
        if(file_exists($file_name))
        {
            require($file_name);
        }
        else
        {
            $this->action_error("pas de vue");
        }
    }

    //* Méthode protégée pour afficher une erreur avec un message
    protected function action_error($message)
    {
        $data=['error'=>$message];
        $this->render('error',$data);
        die();
    }
}

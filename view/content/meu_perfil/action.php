<?
$model = new model\meuPerfil();
$this->setPostArray($_POST);
switch ($this->post->action) {
    case 'editar-usuario':
        if (isset($idUser)) {
            $model->updateUser($idUser,$this->post);
        }
        break;
    case 'alterar-senha':
        $model->updatePassword($this->get->param3,$this->post);
        break;
}


?>

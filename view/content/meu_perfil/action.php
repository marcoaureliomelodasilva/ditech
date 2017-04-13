<?
$model = new model\meuPerfil();

$this->setPostArray($_POST);
// echo $this->post->action;
switch ($this->post->action) {
    case 'editar-usuario':
        if (isset($this->get->param3)) {
            $model->updateUser($this->get->param3,$this->post);
        }
        break;
    case 'alterar-senha':
        $model->updatePassword($this->get->param3,$this->post);
        break;
}


?>

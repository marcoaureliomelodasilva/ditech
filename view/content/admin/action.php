<?
$admin = new model\AdminUser();

$this->setPostArray($_POST);
// echo $this->post->action;
switch ($this->post->action) {
    case 'editar-usuario':
        if (isset($this->get->param3)) {
            $admin->updateUser($this->get->param3,$this->post);
        }
        break;
    case 'exclui-usuario':
        if (isset($this->get->param3)) {
            $admin->deleteUser($this->get->param3);
        }
        break;
    case 'cadastrar-usuario':
        $admin->insertUser($this->post);
        break;
    case 'alterar-senha':
        $admin->updatePassword($this->get->param3,$this->post);
        break;
}


?>

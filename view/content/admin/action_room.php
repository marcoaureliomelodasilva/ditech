<?
$model = new model\AdminRoom();

$this->setPostArray($_POST);
// echo $this->post->action;
switch ($this->post->action) {
    case 'editar-sala':
        if (isset($this->get->param3)) {
            $model->updateRoom($this->get->param3,$this->post);
        }
        break;
    case 'exclui-sala':
        if (isset($this->get->param3)) {
            $model->deleteRoom($this->get->param3);
        }
        break;
    case 'cadastrar-sala':
        $model->insertRoom($this->post);
        break;
}


?>

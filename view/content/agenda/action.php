<?
$model = new model\Scheduling();

$this->setPostArray($_POST);

switch ($this->post->action) {
    case 'editar-agenda':
        if (isset($this->get->param3)) {
            $model->updateScheduling($this->get->param3,$this->post);
        }
        break;
    case 'exclui-agenda':
        if (isset($this->get->param3)) {
            $model->deleteScheduling($this->get->param3);
        }
        break;
    case 'cadastrar-agenda':
        $model->insertScheduling($this->post);
        break;
    case 'alterar-agenda':
        $model->updateScheduling($this->get->param3,$this->post);
        break;
}


?>

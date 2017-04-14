<?
$model = new model\Scheduling();

$this->setPostArray($_POST);
$msgValidSch=0;
switch ($this->post->action) {
    case 'editar-agenda':
        $validate = $model->valididateScheduling($this->post);
        if ($validate) {
           $msgValidSch=1;
        }else{
            if (isset($this->get->param3)) {
                $model->updateScheduling($this->get->param3,$this->post);
            }
        }
        break;
    case 'exclui-agenda':
        if (isset($this->get->param3)) {
            $model->deleteScheduling($this->get->param3);
        }
        break;
    case 'cadastrar-agenda':
        $validate = $model->valididateScheduling($this->post);
        if ($validate) {
           $msgValidSch=1;
        }else{
            $model->insertScheduling($this->post);
        }
        break;
}


?>

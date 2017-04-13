<? 
require_once('action.php'); 
if (isset($this->get->param2)) {
    if ($this->get->param2=='sair') {
        $model->logout();
    }
}
?>


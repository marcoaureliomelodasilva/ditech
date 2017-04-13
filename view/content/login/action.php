<?
$model = new model\Login();
$this->setPostArray($_POST);

switch ($this->post->action) {
    case 'login':
        if (isset($this->post->email) && isset($this->post->password)) {
            $model->validateUser($this->post->email, $this->post->password);
        }
        break;
}
?>

<? 
    $this->get->param3=30;
    require_once('action.php'); 
    $idUser = (isset($this->get->param3))? $this->get->param3 : 0 ;
    $data = $model->selectUsersId($idUser);
    $data=$data[0];
?>
<form action="/meu-perfil/alterar-senha" method="post" class="clearfix">
<input type="hidden" name="action" value="alterar-senha">
<div class="col-lg-6 col-xs-6">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Alterar senha</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-5">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group">
                        <label for="repeat-password">Repita sua senha</label>
                        <input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <button type="submit" class="btn btn-primary pull-right">Salvar</button>
        </div>       
    </div>
</div>
</form>
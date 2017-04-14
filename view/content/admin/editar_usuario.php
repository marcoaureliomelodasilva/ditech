<? 
    require_once('action.php'); 
    $idUser = (isset($this->get->param3))? $this->get->param3 : 0 ;
    $data = $admin->selectUsersId($idUser);
    $data=$data[0];
?>
<form action="/admin/editar-usuario/<?=$this->get->param3;?>" method="post" class="clearfix">
<input type="hidden" name="action" value="editar-usuario">
<div class="col-lg-6 col-xs-6">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Editar usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="form-group">
                        <label for="full-name">Nome Completo</label>
                        <input type="text" id="full-name" name="full-name" value="<?=$data->full_name;?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?=$data->email;?>" class="form-control"  placeholder="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="status" <?=$this->boolResult($data->status,'checked', false);?>> Ativar / Inativar
                        </label>
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

<form action="/admin/editar-usuario/<?=$this->get->param3;?>" method="post" class="clearfix">
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
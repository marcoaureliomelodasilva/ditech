<? 
    require_once('action.php'); 
?>
<form action="/admin/cadastrar-usuario" method="post">
<input type="hidden" name="action" value="cadastrar-usuario">
<div class="col-lg-6 col-xs-6">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Cadatrar usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-10 col-xs-8">
                    <div class="form-group">
                        <label for="full-name">Nome Completo</label>
                        <input type="text" id="full-name" name="full-name" value="" class="form-control" placeholder="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="status" checked> Ativar / Inativar
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-header">
            <h3 class="box-title">Alterar senha</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-10 col-xs-8">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control"  placeholder="">
                    </div>
                </div>
            </div>
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
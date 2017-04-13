<? 
    require_once('action_room.php'); 
?>
<form action="/admin/cadastrar-sala" method="post">
<input type="hidden" name="action" value="cadastrar-sala">
<div class="col-lg-6 col-xs-6">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Dados do usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-10 col-xs-8">
                    <div class="form-group">
                        <label for="full-name">Nome da sala</label>
                        <input type="text" id="room-name" name="room-name" value="" class="form-control" placeholder="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="status" checked> Ativar / Inativar
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
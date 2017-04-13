<? 
    require_once('action_room.php'); 
    $idRoom = (isset($this->get->param3))? $this->get->param3 : 0 ;
    $data = $model->selectRoomId($idRoom);
    $data=$data[0];
?>
<form action="/admin/editar-sala/<?=$this->get->param3;?>" method="post" class="clearfix">
<input type="hidden" name="action" value="editar-sala">
<div class="col-lg-6 col-xs-6">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Dados do usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="form-group">
                        <label for="room-name">Nome Completo</label>
                        <input type="text" id="room-name" name="room-name" value="<?=$data->room_name;?>" class="form-control" placeholder="">
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
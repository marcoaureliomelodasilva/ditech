<? 
    $idUser = (isset($_SESSION["idUser"]))? $_SESSION["idUser"] : 0 ;
    require_once('action.php'); 
?>
<form action="/agenda/cadastrar-agenda" method="post">
<input type="hidden" name="action" value="cadastrar-agenda">
<input type="hidden" name="use_no" value="<?=$idUser;?>">
<div class="col-lg-6 col-xs-6">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Alterar senha</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label for="room_sch">Data</label>
                        <select name="room_sch" id="room_sch" class="form-control room_sch">
                            <option>Selecione</option>
                            <?php 
                            $room = $model->selectRoomAll();
                            if ((count($room) > 0) && is_array($room)) { 
                                foreach ($room as $key => $value) {
                                ?>
                                <option value="<?=$value->mee_no; ?>" ><?=$value->room_name; ?></option>
                                <? 
                                }
                            }
                            ?>                    
                        </select>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group">
                        <label for="date_sch">Data</label>
                        <input type="date" name="date_sch" id="date_sch" class="form-control date_sch">
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group">
                        <label for="hour_sch">Hora</label>
                        <input type="time" name="hour_sch" id="hour_sch" min="1" max="24" class="form-control hour_ag ">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="form-group">
                        <label for="Observação">Observações</label>
                        <textarea id="descr" name="descr" class="form-control"  placeholder=""></textarea>
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
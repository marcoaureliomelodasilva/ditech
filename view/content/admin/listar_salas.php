<? 
    require_once('action_room.php'); 
    $data = $model->selectRoomAll();
?>
<div class="col-md-6">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de salas</h3>
            <div class="box-tools pull-right">
                <a href="/admin/cadastrar-sala" style="color:#FFF;" class="btn btn-primary btn-sm">
                    Nova sala
                </a>
            </div>
        </div>
        <div class="box-body" style="overflow: auto;height: 400px;">
            <?php 
                if (isset($this->get->param3) && $this->get->param3=='excluir') {
            ?>  
            <div class="box box-solid box-danger">
                <div class="box-header">
                    <h3 class="box-title">Atenção</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body clearfix">
                    <p>
                        Tem certeza que deseja excluir esta sala e os agendamentos associados a ela?
                    </p>
                    <div class="box-tools pull-right">
                            <form action="/admin/listar-salas/<?=$this->get->param4; ?>" method="post">
                            <a href="/admin/listar-salas/<?=$this->get->param4; ?>" class="btn btn-primary btn-flat">
                                Cancelar
                            </a>
                            <button type="submit" name="action" value="exclui-sala" class="btn btn-danger btn-flat">
                                Excluir
                            </button>
                            </form>
                       
                    </div>
                </div>
            </div>
            <?php      
                }
            ?>  
            <table class="table table-bordered table-responsive table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 40px">Cod</th>
                        <th>Nome</th>
                        <th style="width: 70px">Status</th>
                        <th style="width: 70px">Editar</th>
                        <th style="width: 70px">Excluir</th>
                    </tr>
                    <?php 
                        if ((count($data) > 0) && is_array($data)) { 
                            $i=1;
                            foreach ($data as $key => $value) {
                    ?>   
                    <tr>
                        <td><?=$value->mee_no; ?></td>
                        <td>
                            <a href="/admin/editar-sala/<?=$value->mee_no; ?>" class="item">
                                <?=$value->room_name; ?>
                            </a>
                        </td>
                        <td>
                            <div name="status" class="col-md-12 ">
                                <i class="fa fa-2 <?=$this->boolResult($value->status,'fa-eye','fa-eye-slash');?>" aria-hidden="true" style="color: <?=$this->boolResult($value->status,'#00a53a','#f56954');?> !important;"></i>
                            </div>
                            
                        </td>
                        <td>
                            <a href="/admin/editar-sala/<?=$value->mee_no; ?>" class="btn btn-primary btn-sm col-md-12">
                                <i class="fa fa-edit" aria-hidden="true" style="color: #FFF !important;"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/listar-salas/excluir/<?=$value->mee_no; ?>" class="btn btn-danger btn-sm col-md-12">
                                <i class="fa fa-close" aria-hidden="true" style="color: #FFF !important;"></i>
                            </a>                          
                        </td>
                    </tr>
                    <?php
                            $i++;
                            }
                        }else{
                    ?>
                        <tr><td colspan='5' style="text-align: center">Não há salas cadastradas</td></tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix"></div>       
    </div>
</div>
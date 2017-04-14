<? 
    $idUser = (isset($_SESSION["idUser"]))? $_SESSION["idUser"] : 0 ;
    require_once('action.php'); 
    $data = $model->selectSchedulingIdUser($idUser);
?>
<div class="col-md-6">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Minha Agenda</h3>
            <div class="box-tools pull-right">
                <a href="/agenda/cadastrar-agenda" style="color:#FFF;" class="btn btn-primary btn-sm">
                    Novo Agendamento
                </a>
            </div>
        </div> 
        <div class="box-body">
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
                        Tem certeza que deseja excluir este agendamentos?
                    </p>
                    <div class="box-tools pull-right">
                        <form action="/agenda/listar-minha-agenda/<?=$this->get->param4; ?>" method="post">
                        <a href="/agenda/listar-minha-agenda" class="btn btn-primary btn-flat">Cancelar</a>
                        <button type="submit" name="action" value="exclui-agenda" class="btn btn-danger btn-flat">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php      
                }
            ?>
            <div  style="overflow: auto;height: 400px;">
            <table class="table table-bordered table-responsive table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Sala</th>
                        <th style="width: 70px">Editar</th>
                        <th style="width: 70px">Excluir</th>
                    </tr>
                    <?php 
                        if ((count($data) > 0) && is_array($data)) { 
                            $i=1;
                            foreach ($data as $key => $value) {
                    ?>   
                    <tr>
                        <td><?=$i; ?></td>
                        <td><?=date('d/m/Y', strtotime($value->date)) ?></td>
                        <td><?=$value->hour; ?></td>
                        <td><?=$value->room_name; ?></td>
                        <td>
                            <a href="/agenda/editar-agenda/<?=$value->res_no; ?>" class="btn btn-primary btn-sm col-md-12">
                                <i class="fa fa-edit" aria-hidden="true" style="color: #FFF !important;"></i>
                            </a>
                        </td>
                        <td>                       
                            <a href="/agenda/listar-minha-agenda/excluir/<?=$value->res_no; ?>" class="btn btn-danger btn-sm col-md-12">
                                <i class="fa fa-close" aria-hidden="true" style="color: #FFF !important;"></i>
                            </a>                          
                        </td>
                    </tr>
                    <?php
                            $i++;
                            }
                        }else{
                    ?>
                        <tr><td colspan='5' style="text-align: center">Não há usuários cadastrados</td></tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
        <div class="box-footer clearfix"></div>       
    </div>
</div>
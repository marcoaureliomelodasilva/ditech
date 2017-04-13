<?
$v = new model\ListarUsuarios();
// echo '<pre>';
// var_dump($v->listAll());
// echo '</pre>';
$usuariosOrdenados=$v->listAll();

// echo '<pre>';
// var_dump($usuariosOrdenados[0]);
// echo '</pre>';
?>

<div class="col-md-6">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de usuários</h3>
        </div><!-- /.box-header -->
        <div class="box-body" style="overflow: auto;height: 400px;">
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
                        if ((count($usuariosOrdenados) > 0) && is_array($usuariosOrdenados)) { 
                            $i=1;
                            foreach ($usuariosOrdenados as $key => $value) {
                    ?>   
                    <tr>
                        <td><?=$i?></td>
                        <td>
                            <a  href="/usuarios/editar-usuario/<?php echo $value->use_no; ?>" class="item">
                                <?php echo $value->full_name; ?>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm col-md-12">
                                <i class="fa fa-check-square-o" aria-hidden="true" style="color: #FFF !important;"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm col-md-12">
                                <i class="fa fa-edit" aria-hidden="true" style="color: #FFF !important;"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm col-md-12">
                                <i class="fa fa-close" aria-hidden="true" style="color: #FFF !important;"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                            $i++;
                            }
                        }else{
                    ?>
                        <tr><td>Não há usuarios cadastrados</td></tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix"></div>       
    </div>
</div>
<div class="col-lg-6 col-xs-6">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Dados do usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="form-group">
                        <label for="full-name">Nome Completo</label>
                        <input type="text" class="form-control" id="full-name" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-header">
            <h3 class="box-title">Alterar senha</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="password">Nova senha</label>
                        <input type="password" class="form-control" id="password" placeholder="">
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="repeat-password">Repita sua senha</label>
                        <input type="password" class="form-control" id="repeat-password" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <button type="submit" class="btn btn-primary pull-right">Salvar</button>
        </div>       
    </div>
</div>
<!-- 
<div class="col-lg-6 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>
               
            </h3>
            <p>
               
            </p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">
           Mais <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div class="col-lg-6 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>
               
            </h3>
            <p>
               
            </p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">
           Mais <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div> -->
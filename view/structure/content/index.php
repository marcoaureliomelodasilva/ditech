<aside class="right-side">

    <!-- cabecalho de conteudo -->
    <section class="content-header">
        <h1>
            Agendamento de salas
            <small>Painel de Controle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Usuarios</li>
        </ol>
    </section>

    <!-- Conteudo principal -->
    <section class="content">
        <div class="row">
        <?php
        if (isset($this->get->param1)) {
            if (!isset($this->get->param2)) $this->get->param2='';
            $this->includeContent($this->get->param1, $this->get->param2);
        }else{
            $this->includeContent('home', 'index');
        }
        ?>
        </div>
    </section>
</aside>
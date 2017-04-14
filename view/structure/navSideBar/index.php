<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../media/img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Olá, Fulano</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="/agenda/listar-agenda-hoje">
                    <i class="fa fa-table"></i> <span>Agenda de hoje</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> 
                    <span>Agendamento</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/agenda/listar-agenda">
                            <i class="fa fa-edit"></i> Toda agenda
                        </a>
                    </li>
                    <li>
                        <a href="/agenda/listar-minha-agenda">
                            <i class="fa fa-user"></i> Minha agenda
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Meu perfil</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/meu-perfil/meus-dados">
                            <i class="fa fa-edit"></i> Meus dados
                        </a>
                    </li>
                    <li>
                        <a href="/meu-perfil/alterar-senha">
                            <i class="fa fa-list"></i> Alterar senha
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> 
                    <span>Administrador</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/listar-usuarios">
                            <i class="fa fa-users"></i>Listar usuários
                        </a>
                    </li>
                    <li>
                        <a href="/admin/listar-salas">
                            <i class="fa fa-check-square-o"></i>Listar Salas
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
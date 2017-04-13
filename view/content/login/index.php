<? require_once('action.php'); ?>

<? if (!isset($_SESSION["idUser"])) { ?>
<div class="form-box" id="login-box">
    <div class="header">Login   <span style="font-size: 16px">( Agendar salas )</span></div>
    <form action="/login" method="post">
        <input type="hidden" name="action" value="login">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="E-mail"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Senha"/>
            </div>          
        </div>
        <div class="footer">                                                               
            <button type="submit" class="btn bg-olive btn-block">Entrar</button>  
            <p><a href="#">Recuperar senha</a></p>
        </div>
    </form>
</div>
<? } ?>
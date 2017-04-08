<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php require_once 'config.php'; ?>
        <?php require_once DBAPI; ?>

        <?php require_once 'config.php'; ?>
        <?php require_once DBAPI; ?>

        <?php include(HEADER_LOGIN); ?>


        <div class="jumbotron">

            <form action="validacao.php" method="post">

                <legend>Login</legend>
                <div class="form-group">
                    <label for="nome">Login</label>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Insira seu Usuário" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Senha</label>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="password" class="form-control"
                               id="pass" name="password" placeholder="Insira sua Senha" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" class="btn-lg" class="pull-right">
                    <span class="glyphicon glyphicon-thumbs-up"></span>
                    Entrar
                </button>
            </form>
        </div> 



        <?php include(FOOTER_TEMPLATE); ?>
    </body>
</html>

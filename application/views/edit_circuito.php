        <?php
        defined('BASEPATH') or exit('No direct script access allowed');
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Novo Circuito</title>

        </head>

        <body>
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php endif; ?>

                <?php extract($circuito);?>
                <div>
                    <h1>Cadastramento de Circuito</h1>
                    <form method="POST" autocomplete="off" action="<?php echo base_url() ?>atulizar_circuito/<?php echo $circuito_id ?>">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite seu nome" value="<?php echo $nome ?>" required>

                        <label>Telefone</label>
                        <input value="<?= $telefone ?>" type="text" id="phone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="telefone" placeholder="Digite seu telefone" required>

                        <label>Valor</label>
                        <input value="<?= $valor ?>" type="text" name="valor" placeholder="Digite o valor do circuito" required>

                        <input type="submit" value="Cadastrar">
                    </form>
                </div>
        </body>

        </html>

        <script>
            function mask(o, f) {
                setTimeout(function() {
                    var v = mphone(o.value);
                    if (v != o.value) {
                        o.value = v;
                    }
                }, 1);
            }

            function mphone(v) {
                var r = v.replace(/\D/g, "");
                r = r.replace(/^0/, "");
                if (r.length > 10) {
                    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                } else if (r.length > 5) {
                    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                } else if (r.length > 2) {
                    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                } else {
                    r = r.replace(/^(\d*)/, "($1");
                }
                return r;
            }
        </script>
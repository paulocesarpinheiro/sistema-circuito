<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Circuito</title>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
</head>

<body>

    <style>
        .botaodopaulo {
            background-color: red;
        }
    </style>
    <section class="content" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <h1 class="page-header">
                        Circuito
                    </h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="botaodopaulo" onclick="window.location.href='<?php echo base_url() ?>cadastrar_circuito'"><i class="fa fa-trophy"></i> Cadastrar Circuito</button>
                        </div>
                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-striped" id="tableNB">
                                <thead>
                                    <tr>
                                        <th style="width:15px;max-width: 18px;">Nome</th>
                                        <th style="width: 10px;max-width: 15px;">Telefone</th>
                                        <th style="width: 40px;max-width: 45px;">Valor</th>
                                        <th style="width: 40px;max-width: 45px;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $circuitos->fetch_assoc()) {   ?>
                                        <tr>
                                            <td><?= $row['nome'] ?></td>
                                            <td><?= $row['telefone'] ?></td>
                                            <td><?= $row['valor'] ?></td>
                                            <td>
                                            <div class="row center">
                                                <div class="col-sm-3">
                                                    <form action="editar_circuito/<?= $row['circuito_id'] ?>" method="post">
                                                        <input type="hidden" value="">
                                                        <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i><span class="hidden-xs"></span></button>
                                                    </form>
                                                </div>

                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-danger" onclick="deletar(<?= $row['circuito_id'] ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
                                                </div>
                                            </div>

                                            </td>
                                            </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />


<script type="text/javascript">
    function deletar(id) {
        alertify.confirm('Tem certeza que deseja deletar este circuito?').setting({
            'title': "Deletar Circuito",
            'labels': {
                ok: 'Aceitar',
                cancel: 'Cancelar'
            },
            'reverseButtons': false,
            'onok': function() {

                $.ajax({
					url: "<?php echo base_url() ?>deletar_circuito/" + id,
					type: "POST",
					cache: false,
					success: function(returnhtml) {
						alertify.success('Item deleted successfully!');
						location.reload(true);
					}

				});

                alertify.success('Item Deletado com Sucesso.');
                location.reload();
            },
            'oncancel': function() {
                alertify.error('Item Não Deletado.');
            }
        }).show();
    }
</script>
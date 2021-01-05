<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title"><?= $Lang->get('SERVERSTATUS_TITLE_SETTING'); ?></h3>
            </div>
            <div class="card-body">
                <form action="<?= $this->Html->url(array('controller' => 'serverStatus', 'action' => 'configen_ajax')) ?>" method="POST" data-ajax="true" data-redirect-url="<?= $this->Html->url(array('controller' => 'serverStatus', 'action' => 'index', 'admin' => 'true')) ?>">
                    <input type="hidden" name="idConfigServerGen" value="<?= $configServerStats['ConfigServerStats']['id']; ?>">
                    <div class="form-group">
                        <label><?= $Lang->get('SERVERSTATUS_MOJANG'); ?></label>
                        <br>
                        <small><?= $Lang->get('SERVERSTATUS_MOJANG_DESC'); ?></small>
                        <div class="radio">
                            <input type="radio" name="show_mojang_server" value="1" <?= ($configServerStats['ConfigServerStats']['isMojang'] == '1') ? 'checked=""' : '' ?>>
                            <label><?= $Lang->get('SERVERSTATUS_SHOW'); ?></label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="show_mojang_server" value="0" <?= ($configServerStats['ConfigServerStats']['isMojang'] == '0') ? 'checked=""' : '' ?>>
                            <label><?= $Lang->get('SERVERSTATUS_DONT_SHOW'); ?></label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT'); ?></button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title"><?= $Lang->get('SERVERSTATUS_TITLE_GESTION'); ?></h3>
            </div>
            <div class="card-body">
                <?php foreach ($servers as $server): ?>
                    <div class="card">
                        <div data-toggle="collapse" data-target="#server-<?= $server['Server']['id']; ?>" style="cursor: pointer;" class="card-header with-border">
                            <h3 class="card-title">Gestion de <?= $server['Server']['name']; ?></h3>
                        </div>
                        <div id="server-<?= $server['Server']['id']; ?>" class="collapse card-body">
                            <form action="<?= $this->Html->url(array('controller' => 'serverStatus', 'action' => 'configserv_ajax', $server['Server']['id'])) ?>" method="post" data-ajax="true" data-upload-image="true" data-redirect-url="<?= $this->Html->url(array('controller' => 'serverStatus', 'action' => 'index', 'admin' => 'true')) ?>">
                                <div class="col-sm-4">
                                    <?php if (!empty($server['Server']['serverstatus-iconurl'])) { ?>
                                        <input type="hidden" name="icon-server-already" value="<?= $server['Server']['serverstatus-iconurl']; ?>">
                                    <?php } ?>
                                    <?php $form_input_server = str_replace("Envoyer une image", "Changer l'icône", $this->element('form.input.upload.img', $form_input)); ?>
                                    <?= str_replace('id="img-form"', 'id="img-form-server-' . $server['Server']['id'] . '"', $form_input_server); ?>
                                    <?php echo "<script>$('#img-form-server-" . $server['Server']['id'] . "').attr('src','" . $server['Server']['serverstatus-iconurl'] . "');</script>"; ?>
                                </div>
                                <div class="col-sm-8">
                                    <label><?= $Lang->get('SERVERSTATUS_TITLE_DESC'); ?></label>
                                    <textarea class="form-control" rows="5" name="motd_server"><?= $server['Server']['serverstatus-motd']; ?></textarea>
                                    <br />
                                    <div class="form-group">
                                        <label><?= $Lang->get('SERVERSTATUS_SHOW_IP'); ?></label>
                                        <br>
                                        <small><?= $Lang->get('SERVERSTATUS_SHOW_IP_DESC'); ?></small>
                                        <div class="radio">
                                            <input type="radio" name="show_ip_server" value="1" <?= ($server['Server']['serverstatus-isShowIp'] == '1') ? 'checked=""' : '' ?>>
                                            <label><?= $Lang->get('SERVERSTATUS_SHOW'); ?></label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="show_ip_server" value="0" <?= ($server['Server']['serverstatus-isShowIp'] == '0') ? 'checked=""' : '' ?>>
                                            <label><?= $Lang->get('SERVERSTATUS_DONT_SHOW'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><?= $Lang->get('SERVERSTATUS_SHOW_CONNECTED'); ?></label>
                                        <br>
                                        <small><?= $Lang->get('SERVERSTATUS_SHOW_CONNECTED_DESC'); ?></small>
                                        <div class="radio">
                                            <input type="radio" name="show_count_server" value="1" <?= ($server['Server']['serverstatus-isShowCount'] == '1') ? 'checked=""' : '' ?>>
                                            <label><?= $Lang->get('SERVERSTATUS_SHOW'); ?></label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="show_count_server" value="0" <?= ($server['Server']['serverstatus-isShowCount'] == '0') ? 'checked=""' : '' ?>>
                                            <label><?= $Lang->get('SERVERSTATUS_DONT_SHOW'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><?= $Lang->get('SERVERSTATUS_SHOW_STATUS_CONNECTION'); ?></label>
                                        <br>
                                        <small><?= $Lang->get('SERVERSTATUS_SHOW_STATUS_CONNECTION_DESC'); ?>Si actif, l'état
                                            de connexion sera affiché dans le status de celui-ci
                                        </small>
                                        <div class="radio">
                                            <input type="radio" name="show_status_server" value="1" <?= ($server['Server']['serverstatus-isShowStatus'] == '1') ? 'checked=""' : '' ?>>
                                            <label><?= $Lang->get('SERVERSTATUS_SHOW'); ?></label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="show_status_server" value="0" <?= ($server['Server']['serverstatus-isShowStatus'] == '0') ? 'checked=""' : '' ?>>
                                            <label><?= $Lang->get('SERVERSTATUS_DONT_SHOW'); ?></label>
                                        </div>
                                    </div>
                                    <br />
                                    <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

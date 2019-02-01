<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box"
                        style="position: relative;top: 4px;left: 6px;"><?= $Lang->get('SERVERSTATUS_TITLE'); ?></h3>
                </div>
                <?php foreach ($server_registre as $servers) { ?>
                    <?php foreach ($servers as $server) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><?= $Lang->get('SERVERSTATUS_TITLE_SERV'); ?> <?= $server["name"]; ?></div>
                            <div class="panel-body">
                                <div class="row">
                                    <?php if (!empty($server['conf']['serverstatus-iconurl'])) { ?>
                                        <div class="col-sm-2">
                                            <img width="100%;" src="<?= $server['conf']['status-iconurl']; ?>">
                                        </div>
                                    <?php } ?>
                                    <div class="col-sm-10">
                                        <?php if ($server['conf']['serverstatus-isShowIp'] == "1") { ?>
                                            <h5><?= $Lang->get('SERVERSTATUS_IP'); ?> <?= $server['ip']; ?></h5><?php } ?>
                                        <?php if ($server['conf']['serverstatus-motd'] == '') { ?>
                                            <h6><?= $Lang->get('SERVERSTATUS_SERV_MOTD'); ?>: <?= $server["motd"]; ?></h6>
                                        <?php } else { ?>
                                            <h6><?= $Lang->get('SERVERSTATUS_SERV_MOTD'); ?>
                                                : <?= $server['conf']['serverstatus-motd']; ?></h6>
                                        <?php } ?>
                                        <?php if ($server["isOnline"] == 'false') { ?>
                                            <?php if ($server['conf']['serverstatus-isShowStatus'] == "1") { ?>
                                                <h6 style="color: red;"><?= $Lang->get('SERVERSTATUS_SERV_DISP_ERROR'); ?></h6>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if ($server['conf']['serverstatus-isShowCount'] == "1") { ?>
                                                <h6>Connectés: <?= $server['playerCount']; ?>
                                                    /<?= $server['playerMax']; ?></h6>
                                            <?php } ?>
                                            <?php if ($server['conf']['serverstatus-isShowStatus'] == "1") { ?>
                                                <h6 style="color: green;"><?= $Lang->get('SERVERSTATUS_SERV_DISP_SUCCESS'); ?></h6>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php if ($configServerStats['ConfigServerStats']['isMojang'] == 1) { ?>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading"><?= $Lang->get('SERVERSTATUS_MOJANG'); ?></div>
                        <div class="panel-body">
                            <?php
                            if (!empty($json)) {
                                $result = json_decode($json, true);
                            }
                            foreach ($result as $address) {
                                $server = array_keys($address)[0];
                                switch ($server) {
                                    case 'minecraft.net':
                                        $server = 'Minecraft.net';
                                        break;
                                    case 'session.minecraft.net':
                                        $server = 'Session.minecraft.net';
                                        break;
                                    case 'account.mojang.com':
                                        $server = 'Account.mojang.com';
                                        break;
                                    case 'auth.mojang.com':
                                        $server = 'Auth.mojang.com';
                                        break;
                                    case 'skins.minecraft.net':
                                        $server = 'Skins.minecraft.net';
                                        break;
                                    case 'authserver.mojang.com':
                                        $server = 'AuthServer.mojang.com';
                                        break;
                                    case 'sessionserver.mojang.com':
                                        $server = 'SessionServer.mojang.com';
                                        break;
                                    case 'api.mojang.com':
                                        $server = 'Api.mojang.com';
                                        break;
                                    case 'textures.minecraft.net':
                                        $server = 'Textures.minecraft.net';
                                        break;
                                    case 'mojang.com':
                                        $server = 'Mojang.com';
                                        break;
                                    default:
                                        $server = 'Error';
                                        break;
                                }
                                $icons = array_values($address)[0];
                                switch ($icons) {

                                    case 'green':
                                        $icons = 'fa fa-check';
                                        break;
                                    case 'red':
                                        $icons = 'fa fa-times';
                                        break; //Do nothing, red is good
                                    case 'yellow':
                                        $icons = 'fa fa-exclamation-triangle';
                                        break; //Do nothing, yellow is good
                                    default:
                                        $icons = 'fa fa-times';
                                        break; //Something went wrong, assume it's down
                                }
                                $colour = array_values($address)[0];
                                switch ($colour) {
                                    case 'green':
                                        $colour = 'green';
                                        $alert = 'success';
                                        break;
                                    case 'red':
                                        $colour = 'red';
                                        $alert = 'danger';
                                        break; //Do nothing, red is good
                                    case 'yellow':
                                        $colour = 'yellow';
                                        $alert = 'warning';
                                        break; //Do nothing, yellow is good
                                    default:
                                        $colour = 'red';
                                        $alert = 'danger';
                                        break; //Something went wrong, assume it's down
                                }
                                echo '<div class="col-sm-6">';
                                echo '<div class="alert alert-' . $alert . '">';
                                echo '<i style="color: ' . $colour . ';" class="' . $icons . '"></i> ';
                                echo $server;
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

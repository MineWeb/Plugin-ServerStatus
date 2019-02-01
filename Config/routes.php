<?php

Router::connect('/serverstatus', array('controller' => 'serverStatus', 'action' => 'index', 'plugin' => 'ServerStatus'));

Router::connect('/serverstatus/configserv_ajax/*', array('controller' => 'serverStatus', 'action' => 'configserv_ajax', 'plugin' => 'ServerStatus', 'admin' => true));

Router::connect('/serverstatus/configen_ajax', array('controller' => 'serverStatus', 'action' => 'configen_ajax', 'plugin' => 'ServerStatus', 'admin' => true));

Router::connect('/admin/serverstatus', array('controller' => 'serverStatus', 'action' => 'index', 'plugin' => 'ServerStatus', 'admin' => true));

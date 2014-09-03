<?php
$httphost = ($_SERVER['HTTP_HOST']);
mysql_connect('localhost','root') or die ('mysql error');
mysql_select_db('magento');
mysql_query('update core_config_data set value="http://'.$httphost.'/" where config_id=6') or die ("error query");
mysql_query('update core_config_data set value="http://'.$httphost.'/" where config_id=7');

echo "host set to :";
echo $httphost;

system("rm -Rf var/cache/mage*");

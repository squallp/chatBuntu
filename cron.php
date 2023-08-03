<?php
$shelloutput = shell_exec('php artisan schedule:run >> /dev/null 2>&1');
echo "<pre>$shelloutput</pre>";
?>
<?php
/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-02-28
 * Time: 8:16 PM
 */

session_start();

echo 'Bienvenue à la page numéro 1';

$_SESSION['name'] = 'fahmi';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();

// Fonctionne si le cookie a été accepté
echo '<br /><a href="http://localhost/ci-pacpi/index.php/dashboard/index">Mesure</a>';

// Ou bien, en indiquant explicitement l'identfiant de session
echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
?>
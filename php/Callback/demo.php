<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of demo
 *
 * @author Administrator
 */


$pid = pcntl_fork();
if ($pid < 0) {
    throw new Exception("Fork child process failed");
} elseif ($pid) {
    die("I am parent process!");
} else {
    die("I am child process!");
}



?>

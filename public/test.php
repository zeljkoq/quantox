<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.5.18.
 * Time: 11.34
 */
function A() {
    try {
        b();
    } catch (Exception $e) {
        echo "Exception caught in " . __CLASS__;
    }
}
function B() {
    echo 5 / "five";
}
try {
    A();
} catch (Error $e) {
    echo "Error caught in global scope: " . $e->getMessage();
}
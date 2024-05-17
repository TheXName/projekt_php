<?php
function showError($key)
{
    if (isset($_SESSION[$key])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION[$key];
        echo '</div>';
    }
}
<?php

require_once "Database.php";

if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];
} else {
    $id = null;
}

if ( $id != null ) {
    $database = new Database();
    $sql = "DELETE FROM leads WHERE id = $id";

    $database->delete( $sql );
}

header("location: /landing_page/listaLead.php");
<?php
//application functions

function get_project_list() {
    include 'connection.php';

    try {
        return $db->query('SELECT project_id, title, category FROM projects');
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<BR>";
        return false;
    }    
}

// var_dump(get_project_list());
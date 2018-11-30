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


function get_task_list() {
    include 'connection.php';

    // IMPORTANT: Each new line MUST begin with empty space to separate words. e.g.) Tasks JOIN instead of TasksJOIN
    $sql = 'SELECT Tasks.*, Projects.title AS project FROM Tasks'
        . ' JOIN Projects ON'
        . ' Projects.project_id = Tasks.project_id';

    try {
        return $db->query($sql);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<BR>";
        return false;
    }    
}


function add_project($title, $category) {
    include 'connection.php';

    $sql = 'INSERT INTO projects(title, category) VALUES (?, ?)';
    try {
        $results = $db->prepare($sql);
        // Args: 1: The first ? placeholder  2: Variable we want to bind from function param  3: The data type for that parameter.
        // In other words this says we will bind $title to the first ? and we want it to be a string.
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $category, PDO::PARAM_STR);
        // Executes our query
        $results->execute();
    } catch (PDOException $e) {
        echo "Line: " . $e->getLine() . "<BR>";
        echo "Message: " . $e->getMessage();
        return false;
    }
    return true;
    // This statement will return true if the statement is successful and false if unsuccessful.
}
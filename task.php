<?php
require 'inc/functions.php';

$pageTitle = "Task | Time Tracker";
$page = "tasks";
// Can each several variables on one line by putting them all together. They all equal an empty string.
$project_id = $title = $task_date = $task_time = ''; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_id = trim(filter_input(INPUT_POST, 'project_id', FILTER_SANITIZE_NUMBER_INT));
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $task_date = trim(filter_input(INPUT_POST, 'task_date', FILTER_SANITIZE_STRING));
    $task_time = trim(filter_input(INPUT_POST, 'task_time', FILTER_SANITIZE_NUMBER_INT));
    
    if(empty($project_id) || empty($title) || empty($task_date) || empty($task_time)) {
        $error_msg = "Please complete all required fields: Project, Title, Date, Time";
    } else {
        if (add_task($project_id, $title, $task_date, $task_time)) {
            header('Location: task_list.php');
            exit;
        } else {
            $error_msg = "Could not add task!";
        }
    }
}

include 'inc/header.php';
?>

<div class="section page">
    <div class="col-container page-container">
        <div class="col col-70-md col-60-lg col-center">
            <h1 class="actions-header">Add Task</h1>
            <?php
                if(isset($error_msg)) {
                    echo "<p class='message'>" . $error_msg . "</p>";
                }
            ?>
            <form class="form-container form-add" method="post" action="task.php">
                <table>
                    <tr>
                        <th>
                            <label for="project_id">Project</label>
                        </th>
                        <td>
                            <select name="project_id" id="project_id">
                                <option value="">Select One</option>
                                <?php
                                    foreach(get_project_list() as $item) {
                                        echo "<option value='" . $item['project_id'] . "'";
                                        if($project_id == $item['project_id']) {
                                            echo ' selected';
                                        }
                                        echo ">" . $item['title'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="title">Title<span class="required">*</span></label></th>
                        <td><input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="date">Date<span class="required">*</span></label></th>
                        <td><input type="text" id="date" name="task_date" value="<?php echo htmlspecialchars($task_date); ?>" placeholder="mm/dd/yyyy" /></td>
                    </tr>
                    <tr>
                        <th><label for="time">Time<span class="required">*</span></label></th>
                        <td><input type="text" id="time" name="task_time" value="<?php echo htmlspecialchars($task_time); ?>" /> minutes</td>
                    </tr>
                </table>
                <input class="button button--primary button--topic-php" type="submit" value="Submit" />
            </form>
        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>

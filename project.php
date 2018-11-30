<?php
require 'inc/functions.php';

$pageTitle = "Project | Time Tracker";
$page = "projects";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Args: 1. $type 2. field e.g.) 'title' 3. fitler
    // E.g.) 'title' is the equivalent of $_GET['title']
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING));

    if(empty($title) || empty($category)) {
        $error_msg = "Please complete all required fields: Title, Category";
    } else {
        // echo "Title: $title <BR>";
        // echo "Category: $category <BR>";
        if(add_project($title, $category)) {
            // Redirect to  project page
            header('Location: project_list.php');
            // Make sure the execution of the current script is stopped.
            exit;
        } else {
            $error_msg = 'Could not add project!';
        }
    }
}

include 'inc/header.php';
?>

<div class="section page">
    <div class="col-container page-container">
        <div class="col col-70-md col-60-lg col-center">
            <h1 class="actions-header">Add Project</h1>
            <?php
                if(isset($error_msg)) {
                    echo "<p class='message'>" . $error_msg . "</p>";
                }
            ?>
            <form class="form-container form-add" method="post" action="project.php">
                <table>
                    <tr>
                        <th><label for="title">Title<span class="required">*</span></label></th>
                        <td><input type="text" id="title" name="title" value="" /></td>
                    </tr>
                    <tr>
                        <th><label for="category">Category<span class="required">*</span></label></th>
                        <td><select id="category" name="category">
                                <option value="">Select One</option>
                                <option value="Billable">Billable</option>
                                <option value="Charity">Charity</option>
                                <option value="Personal">Personal</option>
                        </select></td>
                    </tr>
                </table>
                <input class="button button--primary button--topic-php" type="submit" value="Submit" />
            </form>
        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>

# What is CRUD?

> CRUD is an acronym for the 4 main actions you would want to perform on data in a database.

* **C**reate
* **R**ead
* **U**pdate
* **D**elete or **D**estroy

# SQL Keyword for each Operation

| Operation | SQL Keyword |
| --------- | ----------- |
| Create    | INSERT      |
| Read      | SELECT      |
| Update    | UPDATE      |
| Delete    | DELETE      |



# Accepting User Data

* Accept data from a form.

* It is important to **filter input** and **escape output** to make sure we're not getting harmful data.
* Filter incoming form data to ensure it's in the format we expect.
* Escape output by using a prepared statement when interacting with the database to prevent SQL Injection Attacks.
    * SQL Injection is when a query you never intended to run is inappropriately inserted into your code.

    * E.g.) If we are expecting a user to enter a title for their project e.g.) mynewproject, but instead they enter mynewproject:DROP TABLE projects; We would have two queries:
        * The one we want which gives title to the project "mynewproject".

        * A query that drops the projects table.

* mixed filter_input ( int $type , string $variable_name [, int $filter = FILTER_DEFAULT [, mixed $options ]] )

* Prepared statements are important to use when accepting and offer two major benefits:
    
    1) Properly escapes the variables so that no SQL Injection will occur.

    2) They only need to be parsed or prepared once but can be executed multiple times with the same or different parameters. This means a prepared statement has fewer resources and run faster. 

* Preparing statements is a 3 step process.
    
    1) Prepare the query e.g.) $results = $db->prepare($sql);
    
    2) Bind parameters or values e.g.) $results->bindValue(1, $title, PDO::PARAM_STR);  1st arg references the first ?  2nd arg references the variable we want to bind   3rd arg is the data type we want for the parameter.
    3) Execute the query / statement e.g.) $results->execute();

* Output should be escaped whenever you output user data to prevent malicous from being introduced.
* htmlspecialchars($var_name) escapes output by converting special characters to HTML entities.

```
Example: 
$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;  // converted to special characters

```

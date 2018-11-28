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



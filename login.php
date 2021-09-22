<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "stocktable";
// Create connection
$GLOBALS['conn'] = new mysqli($servername, $username, $password, $db);
// Check connection
if ($GLOBALS['conn']->connect_error)
{
    die("Connection failed: " . $GLOBALS['conn']->connect_error);
}
echo "Connected successfully";
function insertRecord()
{
    $qry = "insert into users(email,password,firstName,lastname) values('sonusanwal65@gmail.com','abcd1234','Suraj','Sanwal')";
    if ($GLOBALS['conn']->query($qry))
    {
        echo "record inserted sucessfully";
    }
    else
    {
        die("insert failed: " . $GLOBALS['conn']->error);
    }
}
/**
 * function used for excute sql queries.
 */
function excuteQuery($qry)
{
    if ($GLOBALS['conn']->query($qry))
    {
        return true;
    }
    else
    {
        return false;
    }
}
/**
 * function used to return response from sql query
 */
function getQueryResponse($qry)
{
    $result = $GLOBALS['conn']->query($qry);
    $i = 0;
    $res = [];
    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $res[$i] = $row;
            $i++;
        }
    }
    return $res;
}
/**
 * select a all fields from table with out condition
 * @param string $table is a string with table name ex "user"
 */
function selectAll($table)
{
    $qry = "select * from $table";
    return getQueryResponse($qry);
}
/**
 * select a all fields from table where cond exists
 * @param string $table is a string with table name ex "user"
 * @param string $con is condition to pass 
 */
function selectAllWhere($table, $cond)
{
    $qry = "select * from $table where $cond";
    return getQueryResponse($qry);
}
/**
 * select a single field from table
 * @param array $field is a field Name.
 * @param string $table is a string with table name ex "user"
 * @param string $con is condition to pass 
 */
function selectFieldWhere($table, $field, $cond)
{
    $qry = "select $field from $table where $cond";
    return getQueryResponse($qry);
}
/**
 * select required fields from table 
 * @param array $fields is an array of diffent field Names. example ['abc','bac']
 * @param string $table is a string with table name ex "user"
 * @param string $con is condition to pass 
 */
function selectFieldsWhere($table, $fields, $con)
{
    $qry = "select " . implode(',', $fields) . " from $table where $con";
    //implode convert an array to string with patterns provided ex: ['email','name']==> (email,name)
    return getQueryResponse($qry);
}
/**
 * insert into is a common query builder for insert data into a table
 * @param array $value is an array of diffent values. example ['abc','bac']
 * @param string $table is a string with table name ex "user"
 */
function insertInto($value = [], $table = "")
{
    echo $qry = "insert into $table values(" . implode(',', $value) . ")";
    return excuteQuery($qry);
}
/**
 * insert into is a common query builder for insert data into specific fields in a table
 * @param array $fields is an array of diffent field name. example ['email','password']
 * @param array $values is an array of diffent values. example ['abc','bac']
 * @param string $table is a string with table name ex "user"
 */
function insertIntoFields($fields, $values, $table)
{
    echo $qry = "insert into(" . implode(',', $fields) . ") $table values(" . implode(',', $values) . ")";
    return excuteQuery($qry);
}
/**
 * insert into is a common query builder for insert data into specific fields in a table
 * @param string $field is a string of field name. example 'email'
 * @param array $value is a string of field values. example 'abc@ac.com'
 * @param string $table is a string with table name ex "user"
 * @param string $cond is an conditio which lie for where ex: email==="value"
 */
function updateField($field, $table, $value, $cond)
{
    echo $sql = "update $table set " . $field . ' = ' . $value . " where $cond";
    return excuteQuery($qry);
}
?>

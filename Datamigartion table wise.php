

<?php
/** Database Synchronisation / Migration Tool
 *
 * For synching up an old and a new DB schema.
 *
 *
 */

//do you want the system to empty the new table before inserting data from the old table?
$truncate=true;

/**
 * DB Server Credentials - Needs to have full access to both databases
 */
$dbHost='localhost';
$dbUser='root';
$dbPass='Password';
$_conn = mysql_connect($dbHost,$dbUser,$dbPass) or die('DB Connection Failed');

$dbOld = 'backup';


$dbNew = 'merged';

/** Tables to Synch
 */

$tablesToSynch = array(
'accounts',
'accounts_cstm',
    
);

mysql_select_db($dbOld, $_conn);
mysql_select_db($dbNew, $_conn);

$dbOldTables= fetch_tables($dbOld);

$dbNewTables = fetch_tables($dbNew);




foreach($tablesToSynch as $table){
$result = mysql_query("SELECT * FROM $dbOld.$table",$_conn);
$num_rows = mysql_num_rows($result);
echo '<h3 style="color:red">Before Datamigration Number of Records in Ib_Backup '.$table .':'.$num_rows.'</h3>';
//echo "$num_rows Rows\n";
echo '<h3>Doing '.$table.'</h3>';
    //check for common tables
    if(in_array($table, $dbOldTables) && in_array($table, $dbNewTables)){
        //now get column data
        $dbOldTableCols = fetch_columns($dbOld,$table);
      

        $dbNewTableCols = fetch_columns($dbNew,$table);

        //now for the column comparison
        $cols=array_intersect($dbOldTableCols, $dbNewTableCols);

        //now emptying the new DB if set to do so
        if($truncate){
            db_query("TRUNCATE $dbNew.$table");
        }

        //copy old table to new DB so we can copy columns
        $tempTable=copy_table($dbOld, $dbNew, $table);

        //now build SQL and run
        $sql = "insert into $dbNew.$table (" . implode(', ',$cols) . ") select " . implode(', ',$cols) . " from $dbNew.$tempTable";
        db_query($sql);
        $result = mysql_query("SELECT * FROM $dbNew.$table",$_conn);
        $num_rows = mysql_num_rows($result);
      echo '<h3 style="color:blue">After Datamigration Number of Records in '.$table .':'.$num_rows.'</h3>';

        //now drop temp table
        db_query("DROP TABLE $dbNew.$tempTable");
    }
    
}

/***** FUNCTIONS *******/

function db_query($query){
$output = mysql_query($query) or die('
<h1 style="color: red">Uh Oh......MySQL Error:</h1>
<h3>Query:</h3>
<pre>' . htmlentities($query) . '</pre>
<h3>MySQL Error:</h3>
' . mysql_error() . '
<hr /> <hr />'); return $output;
}


function fetch_tables($dbname){
    $query=db_query("show tables from $dbname");
    while($r=mysql_fetch_assoc($query)){
        $return[]=$r["Tables_in_$dbname"];
    }
    return $return;
}

function fetch_columns($dbname, $table){
    $query = db_query("SHOW COLUMNS from $dbname.$table");
    while($r= mysql_fetch_assoc($query)){
        $return[]=$r['Field'];
    }
    return $return;
}

function copy_table($fromDb, $toDb, $table){
    db_query("DROP TABLE IF EXISTS $toDb.temp_$table");
 db_query("CREATE TABLE $toDb.temp_$table LIKE $fromDb.$table");
 db_query("ALTER TABLE $toDb.temp_$table DISABLE KEYS");
 db_query("INSERT INTO $toDb.temp_$table SELECT * FROM $fromDb.$table");
 db_query("ALTER TABLE $toDb.temp_$table ENABLE KEYS");
    return "temp_$table";
}

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<?php
/**
 * Created by PhpStorm.
 * User: user1  (Hub Arnold)
 * Date: 2/8/19
 * Time: 10:00 AM
 */

main::start("example.csv");

class main{

    static public function start($csvfilename) {

        $records = CSV::getRecords($csvfilename);
        $html_table = html::generateTable($records);
        system::printPage($html_table);

        }
}
class CSV
{

    static public function getRecords($csvfilename)
    {
        $file = fopen($csvfilename, "r");

        $fieldNames = array();

        $count = 0;

        while (!feof($file)) {

            $record = fgetcsv($file);
            if ($count == 0) {
                $fieldNames = $record;
            } else {
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }

        fclose($file);
        return $records;
    }
}
class record {

    public function __construct(Array $fieldNames = null, $values = null)
    {

        $record = array_combine($fieldNames, $values);

        foreach ($record as $property => $value) {
            $this -> createProperty($property, $value);
        }

    }

    public function returnArray( )  {
        $array = (array) $this;
        return $array;
    }

    public function createProperty($name, $value) {
        $this -> {$name} = $value;

    }
}
class recordFactory {

    public static function create(Array $fieldNames = null, Array $record = null) {


        $record = new record($fieldNames, $record);

        return $record;
    }
}
class html
{
    public function generateTable($records)
    {

        $count = 0;
        foreach ($records as $record) {

            if ($count == 0) {
                $array = $record->returnArray();
                $headings = array_keys($array);  // pull table headings from full array result using "array_keys"
            }
                else {
            }
            $count++;
        }

        // construct html table logic and pull in bootstrap details using bootstrap CDN entires listed at the top.
        $html_logic = "";

        $html_logic .= "<div class='container', style='background-color: lightcyan' >";

        $html_logic .= "<table class='table table-striped table-hover'>";

        $html_logic .= "<tr>";

        foreach ($headings as $key => $value) {
            $html_logic .= "<th>$value</th>";
        }
        $html_logic .= "</tr>";

        foreach ($records as $key => $value) {
            $html_logic .= "<tr>";
                foreach ($value as $key2 => $value2)
                    $html_logic .= "<td>$value2</td>";
        }
        $html_logic .= "</tr>";

        $html_logic .= "</table>";

        $html_table = $html_logic;

        return $html_table;
    }
}
class system {
    static public function printPage($page){

        echo $page;

    }
}

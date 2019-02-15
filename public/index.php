


<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 2/8/19
 * Time: 10:00 AM
 */



main::start("example.csv");



class main{


    /**
     *
     */
    static public function start($csvfilename) {

        $records = CSV::getRecords($csvfilename);
        $table - html::generateTable($records);



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

        //print_r($fieldNames);
       // print_r($values);
        $record = array_combine($fieldNames, $values);

        foreach ($record as $property => $value) {
            $this -> createProperty($property, $value);
        }

    }

    public function returnArray( )  {
        $array = (array) $this;
        return $array;
    }

    public function createProperty($name = 'first', $value = 'keith') {
        $this -> {$name} = $value;

    }
}




class recordFactory {

    public static function create(Array $fieldNames = null, Array $record = null) {

        // print_r($fieldNames);
        // print_r($record);

        $record = new record($fieldNames, $record);

        return $record;

}


}
class html {
    public static function generateTable($records) {

        foreach ($records as $record) {
            $array = $record->returnArray();
            print_r($array);
        }

    }
}



/** HTML table output

$table  = "";

$table .= "<div class='container', style='background-color: lemonchiffon' >";

$table .= "<table class='table table-striped table-hover'>";

foreach($records as $key => $element){
    $table .= "<tr>";
    foreach($element as $subkey => $subelement){
        $table .= "<td>$subelement</td>";
    }
    $table .= "</tr>";
}
$table .= "</table>";

echo $table;  */














<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 2/8/19
 * Time: 10:00 AM
 */



main::start();



class main
{

    /**
     *
     */
    static public function start()  {

        $file = fopen("example.csv",  "r");

        while(! feof($file))

        {

            $record = fgetcsv($file);

            $records[] = $record;
        }

        fclose($file);
        print_r($records);






        $table  = "";

        /**  $table .= "<div class='container' >";  */

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

        echo $table;





        }




}


class csv   {}




class html  {

}

?>






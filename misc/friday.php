<?php 
    include "top.php";
    $columns = 8;
    $query = 'SELECT * FROM tblStudents ORDER BY fldLastName, fldFirstName LIMIT 10 OFFSET 1000';
    
    //public function testquery($query, $values = "", $wheres = 0, $conditions = 0, $quotes = 0, $symbols = 0, $spacesAllowed = false, $semiColonAllowed = false)
    $info2 = $thisDatabaseReader->select($query, "", 0, 1, 0, 0, false, false);
    print "<h1>Total Records: " .count($info2) ."</h1>";
    print "<h2>Query: " .$query ."</h2>";
    print "<table>";
    $highlight = 0; // used to highlight alternate rows
    
    $labels = array_filter(array_keys($info2[0]), "is_string");
    print "<p><pre>";
    print_r($labels);
    print "<tr>";
    foreach ($labels as $label) {
    	$words[] = preg_split('/(?=[A-Z])/', $label);
    	$total = "";
    	foreach ($words as $word) {
    		$total = $total . " " . $word;
    	}
    	print "<th>" . $total . "</th>";
    }
    print "</tr>";
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
        }
        print '</tr>';
    }
    print "</table>";
    include "footer.php";

?>
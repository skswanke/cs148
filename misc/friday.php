<?php 
    include "top.php";
    $num = 10;
    $start = 0;
    if ($_GET["num"]){
    	$num = (int) $_GET["num"];
    }
    if ($_GET["start"]){
    	$start = (int) $_GET["start"];
    }
    $columns = 8;
    $query = 'SELECT * 
    		  FROM tblStudents 
    		  ORDER BY fldLastName, fldFirstName 
    		  LIMIT ' . $num . ' OFFSET ' .$start;
    
    $fullquery = "SELECT * 
        		  FROM tblStudents 
        		  ORDER BY fldLastName, fldFirstName";

    //public function testquery($query, $values = "", $wheres = 0, $conditions = 0, $quotes = 0, $symbols = 0, $spacesAllowed = false, $semiColonAllowed = false)
    $info2 = $thisDatabaseReader->select($query, "", 0, 1, 0, 0, false, false);
    $info3 = $thisDatabaseReader->select($fullquery, "", 0, 1, 0, 0, false, false);
    print "<h1>Total Records: " .count($info2) ."</h1>";
    print "<h2>Query: " .$query ."</h2>";
    print "<table>";
    $highlight = 0; // used to highlight alternate rows
    
    $labels = array_filter(array_keys($info2[0]), "is_string");
    print "<p><pre>";
    print_r($labels);
    print "<tr>";
    foreach ($labels as $label) {
    	print "<th>" . substr($label, 3) . "</th>";
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
    if (($start - $num) >= 0){
    	print "<a href=\"friday.php?num=" . $num . "&start=" . ($start - $num) . "\"><button>Previous Page</button></a>";
    } else {
    	print "<a href=\"friday.php?num=" . $num . "&start=" . 0 . "\"><button>Previous Page</button></a>";
    }
    if (($start + $num) <= (count($info3) - $num)) {
    	print "<a href=\"friday.php?num=" . $num . "&start=" . ($start + $num) . "\"><button>Next Page</button></a>";
    } else {
    	print "<a href=\"friday.php?num=" . $num . "&start=" . (count($info3) - $num) . "\"><button>Next Page</button></a>";
    }
    print "<p>Pages: " . (count($info3) / 10) . "</p>";
    include "footer.php";

?>
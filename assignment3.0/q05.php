<?php 
    include "top.php";
    $columns = 3;
    $query = 'SELECT tblTeachers.fldFirstName, tblTeachers.fldLastName,  count(tblStudents.fldFirstName) as total
              FROM tblSections
                JOIN tblEnrolls on tblSections.fldCRN  = tblEnrolls.`fnkSectionId`
                JOIN tblStudents on pmkStudentId = fnkStudentId
                JOIN tblTeachers on tblSections.fnkTeacherNetId=pmkNetId
              WHERE fldType != "LAB"
              group by fnkTeacherNetId
              ORDER BY total desc
';
//($query, $values = "", $wheres = 0, $conditions = 0, $quotes = 0, $symbols = 0, $spacesAllowed = false, $semiColonAllowed = false)
    //$info2 = $thisDatabaseReader->testquery($query, "", 1,0,2,0,false,false);
    $info2 = $thisDatabaseReader->select($query, "", 1, 2, 2, 0, false, false);
    print "<h1>Total Records: " .count($info2) ."</h1>";
    print "<h2>Query: " .$query ."</h2>";
    print "<table>";
    $highlight = 0; // used to highlight alternate rows
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

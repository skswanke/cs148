<?php ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sam Swanke CS148</title>
  <meta name="author" content="Sam Swanke">
  <meta name="description" content="Sam Swanke's submission for assignment2.0">
</head>
<body>
  <h1>Sam Swanke Select Statements</h1>
  <ul>
    <li><a href="q01.php">q01:</a> SELECT pmkNetId FROM tblTeachers</li>
    <li><a href="q02.php">q02:</a> SELECT fldDepartment FROM tblCourses WHERE fldCourseName LIKE "Introduction%</li>
    <li><a href="q03.php">q03:</a> SELECT * FROM tblSections WHERE fldStart="13:10:00" AND fldBuilding="Kalkin"</li>
    <li><a href="q04.php">q04:</a> SELECT * FROM tblCourses WHERE fldCourseNumber=148 AND fldDepartment="CS"</li>
    <li><a href="q05.php">q05:</a> SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId LIKE "r%o"</li>
    <li><a href="q06.php">q06:</a> SELECT fldCourseName FROM tblCourses WHERE fldCourseName LIKE "%data%" AND fldDepartment != "CS"</li>
    <li><a href="q07.php">q07:</a> SELECT DISTINCT fldDepartment FROM tblCourses</li>
    <li><a href="q08.php">q08:</a> SELECT DISTINCT fldBuilding, COUNT(fldSection) FROM tblSections GROUP BY fldBuilding</li>
    <li><a href="q09.php">q09:</a> SELECT fldBuilding, COUNT(fldNumStudents) FROM tblSections WHERE fldDays LIKE "%W%" GROUP BY fldBuilding ORDER BY COUNT(fldNumStudents) DESC</li>
    <li><a href="q10.php">q10:</a> SELECT fldBuilding, COUNT(fldNumStudents) FROM tblSections WHERE fldDays LIKE "%F%" GROUP BY fldBuilding ORDER BY COUNT(fldNumStudents) DESC</li>
  </ul>
</body>
</html>
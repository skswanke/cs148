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
    <li><a href="q01.php">q01:</a> SELECT DISTINCT fldCourseName 
              FROM tblCourses, tblEnrolls 
              WHERE pmkCourseId = fnkCourseId 
                AND fldGrade = 100</li>
    <li><a href="q02.php">q02:</a> SELECT DISTINCT fldDays, fldStart, fldStop 
              FROM tblTeachers, tblSections 
              WHERE pmkNetId = fnkTeacherNetId
                AND fldFirstName LIKE "Robert%"
                AND fldLastName = "Snapp"
              ORDER BY fldStart ASC</li>
    <li><a href="q03.php">q03:</a> SELECT DISTINCT fldCourseName, fldDays, fldStart, fldStop 
              FROM tblTeachers, tblSections, tblCourses 
              WHERE pmkNetId = fnkTeacherNetId
                AND pmkCourseId = fnkCourseId
                AND fldFirstName LIKE "Jackie%"
                AND fldLastName = "Horton"
              ORDER BY fldStart ASC</li>
    <li><a href="q04.php">q04:</a> SELECT fldCRN, fldFirstName, fldLastName 
              FROM tblCourses, tblStudents, tblEnrolls, tblSections
              WHERE pmkStudentId = fnkStudentId
              AND fldCRN = fnkSectionId
              AND pmkCourseId = tblEnrolls.fnkCourseId
              AND pmkCourseId = tblSections.fnkCourseId
              AND pmkCourseId = 392
              ORDER BY fldCRN, fldLastName, fldFirstName</li>
    <li><a href="q05.php">q05:</a> SELECT tblTeachers.fldFirstName, tblTeachers.fldLastName,  count(tblStudents.fldFirstName) as total
              FROM tblSections
                JOIN tblEnrolls on tblSections.fldCRN  = tblEnrolls.`fnkSectionId`
                JOIN tblStudents on pmkStudentId = fnkStudentId
                JOIN tblTeachers on tblSections.fnkTeacherNetId=pmkNetId
              WHERE fldType != "LAB"
              group by fnkTeacherNetId
              ORDER BY total desc</li>
    <li><a href="q06.php">q06:</a> SELECT fldFirstName, fldPhone, fldSalary
              FROM tblTeachers
              WHERE fldSalary &lt; (SELECT AVG(fldSalary) FROM tblTeachers)</li>
    <li><a href="q07.php">q07:</a> SELECT DISTINCT fldDepartment FROM tblCourses</li>
    <li><a href="q08.php">q08:</a> SELECT DISTINCT fldBuilding, COUNT(fldSection) FROM tblSections GROUP BY fldBuilding</li>
 </ul>
</body>
</html>
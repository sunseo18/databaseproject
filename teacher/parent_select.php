<?php
   $con=mysqli_connect("localhost", "root", "password", "학원관리시스템") or die("MySQL 접속 실패!" . $mysqli->connect_error);

   $sql ="SELECT 학부모.*, 학생.이름, 학생.아이디 FROM 학부모 INNER JOIN 학생 ON 학부모.학생아이디 = 학생.아이디";

   $ret = mysqli_query($con, $sql);
   if($ret) {
           //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
           $count = mysqli_num_rows($ret);
   }
   else {
           echo "학부모 데이터 조회 실패!"."<br>";
           echo "실패 원인 :".mysqli_error($con);
           exit();
   }

   echo "<h1> 학부모 조회 결과 </h1>";
   echo "<TABLE border=1>";
   echo "<TR>";
   echo "<TH>학생 아이디</TH><TH>학생 이름</TH><TH>관계(부/모)</TH><TH>학부모 연락처</TH>";
   echo "</TR>";

   while($row = mysqli_fetch_array($ret)) {
          echo "<TR>";
          echo "<TD>", $row['아이디'], "</TD>";
          echo "<TD>", $row['이름'], "</TD>";
          echo "<TD>", $row['관계(부/모)'], "</TD>";
          echo "<TD>", $row['연락처'], "</TD>";
          echo "</TR>";
   }
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='../teacher.html'> <--뒤로 가기</a> ";
?>

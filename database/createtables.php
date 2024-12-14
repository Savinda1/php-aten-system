<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/attendanceapp/database/database.php";

function clearTable($dbo, $tabName) {
    // Use the table name directly in the query
    $c = "DELETE FROM $tabName"; // No named placeholders allowed for table names
    $s = $dbo->conn->prepare($c);

    try {
        $s->execute();
    } catch (PDOException $oo) {
        echo "Error clearing table: " . $oo->getMessage();
    }
}

$dbo = new Database();

// Create the student_details table
$c = "CREATE TABLE studaa_details (
            id INT AUTO_INCREMENT PRIMARY KEY, 
            roll_no VARCHAR(25) UNIQUE, 
            name VARCHAR(25)
        )";

$s = $dbo->conn->prepare($c);

try {
    $s->execute();
    echo("<br> Studa_details created successfully");
} catch (PDOException $o) {
    echo "<br> Studa_details not created successfully: " . $o->getMessage();
}


//course table 

$c="create table cours_details (id int auto_increment primary key, 
            code varchar(25) unique,
            title varchar(25),
           credit int(10))"; 

$s=$dbo->conn->prepare($c);

try{
$s->execute();
echo("<br> Cours_details created successfully");
}
catch(PDOException $o) {
    print("<br> Cours_details not created successfully");

}

//faculty table

$c="create table fculty_details (
id int auto_increment primary key, 
             user_name varchar(25) unique,
            name varchar(105),
              password varchar(10)
              )";

$s=$dbo->conn->prepare($c);

try{
$s->execute();
echo("<br> fculty_details created successfully");
}
catch(PDOException $o) {
    print("<br> fculty_details not created successfully");

}

//session table

$c="create table sesion_details (
    id int auto_increment primary key, 
                 year int,
                term varchar(50),
                unique (year,term)
                  )";
    
    $s=$dbo->conn->prepare($c);
    
    try{
    $s->execute();
    echo("<br> sesion_details created successfully");
    }
    catch(PDOException $o) {
        print("<br> sesion_details not created successfully");
    
    }

    //course registration

    $c="create table curse_registration(
       student_id int,
       course_id int,
       session_id int,
       primary key (student_id, course_id, session_id) 
       )";
        
        $s=$dbo->conn->prepare($c);
        
        try{
        $s->execute();
        echo("<br> curse_registration successfully");
        }
        catch(PDOException $o) {
            print("<br> curse_registration not  successfully");
        
        }
        
    //course_allotment
    $c="create table curse_allotment (
        faculty_id int,
        course_id int,
        session_id int,
        primary key (faculty_id, course_id, session_id) 
        )";
         
         $s=$dbo->conn->prepare($c);
         
         try{
         $s->execute();
         echo("<br>  curse_allotment successfully");
         }
         catch(PDOException $o) {
             print("<br>  curse_allotment  not  successfully");
         
         }

         //attendance

         $c="create table atendance_details (
            faculty_id int,
            course_id int,
            session_id int,
            student_id int,
           on_date date,
           status varchar(25),    
                   primary key (faculty_id, course_id, session_id, student_id,on_date)
            )";
             
             $s=$dbo->conn->prepare($c);
             
             try{
             $s->execute();
             echo("<br>  atendance_details  successfully");
             }
             catch(PDOException $o) {
                 print("<br> atendance_details   not  successfully");
             
             }

//insert into values

$c = "INSERT INTO studaa_details (id, roll_no, name)
      VALUES
      (1,'CSB21001','Bhaskar'),
      (2,'CSB21002','ballad'),
      (3,'CSB21003','gsg')
      ON DUPLICATE KEY UPDATE name=VALUES(name)";

 $s=$dbo->conn->prepare($c);
             try { 
                $s->execute();}
                catch (PDOException $o) {
                    echo("<br>duplicate entry in database");}

$c="insert into fculty_details (id,user_name,name,password) values
                    (1, 'Thaja', 'Kamal', '123abc'),
                    (2, 'Suresh', 'Suresh', '456cd'),
                    (3, 'Ravi', 'Ravi', '789ef'),
                    (4, 'Kishore', 'Kishore', 'abcd1'),
                    (5, 'Prakash', 'Prakash', 'ghij2'),
                    (6, 'Prasanna', 'Prasanna', 'klmn3'),
                    (7, 'Ganesh01', 'Ganesh', 'opq45'),  
                    (8, 'Krishna01', 'Krishna', 'rstv6'),  
                    (9, 'Ramesh', 'Ramesh', 'uvw78'),
                    (10, 'Ganesh02', 'Ganesh', 'xyz90'),  
                    (11, 'Kasun', 'Kasun', 'pqr01'),
                    (12, 'Dinesh', 'Dinesh', 'stu12'),
                    (13, 'Krishna02', 'Krishna', 'vwx34'),  
                    (14, 'Priya', 'Priya', 'yza56'),
                    (15, 'Priyaka', 'Priyanka', 'bcd78')";
                

                 $s=$dbo->conn->prepare($c);
                 try {
                $s->execute();}
                catch (PDOException $e) { echo("<br> duplicate entry in database"); }

                $c = "INSERT INTO sesion_details(id, year, term) VALUES
      (1, 2019, '19/20Students'),
      (2, 2020, '20/21Students'),
      (3, 2021, '21/22Students')";


                 $s=$dbo->conn->prepare($c);
                 try {
                $s->execute();}
             catch (PDOException $e) { echo("<br> duplicate entry in database"); }

             $c="insert into cours_details(id,code,title,credit)values
             (1,'MATH101','Mathemati',3),
             (2,'PHYS101','Physi',3),
             (3,'CHEM101','Chemisry',3),
             (4,'MATH102','Mathematics',3),
             (5,'PHYS102','Physis',3),
             (6,'CHEM102','Chemiry',3),
             (7,'MATH103','Mathematic',3),
             (8,'PHYS103','Physics',3),
             (9,'CHEM103','Chemistry',3)";

             $s=$dbo->conn->prepare($c);
             try {
                $s->execute();}
             catch (PDOException $e) { echo("<br> duplicate entry in database"); }

             //if any record all

             clearTable($dbo,"curse_registration");

             $c="insert into curse_registration (student_id,course_id,session_id)values
             (:sid, :cid, :sessid)";

             $s=$dbo->conn->prepare($c);
    


    //2 students         
   for($i=1;$i<3;$i++) 
    {
        for($j=0;$j<3;$j++){

            $cid =rand(1,6);

            try{
                $s->execute([":sid"=>$i,"cid"=>$cid,":sessid"=>1]);
            }
            catch(PDOException $pe){

            }


        }

        //session 2
        $cid =rand(1,6);

            try{
                $s->execute([":fid"=>$i,"cid"=>$cid,":sessid"=>2]);
            }
            catch(PDOException $pe){

            }


    }

    //if any records

    clearTable($dbo,"curse_allotment ");

             $c="insert into curse_allotment(faculty_id, course_id, session_id)values
             (:fid, :cid, :sessid)";

             $s=$dbo->conn->prepare($c);
    


    //2 students         
   for($i=1;$i<6;$i++) 
    {
        for($j=0;$j<2;$j++){

            $cid =rand(1,6)
;
            try{
                $s->execute([":fid"=>$i,"cid"=>$cid,":sessid"=>1]);
            }
            catch(PDOException $pe){

            }


        }

        //session 2
        $cid =rand(1,6);

            try{
                $s->execute([":fid"=>$i,"cid"=>$cid,":sessid"=>2]);
            }
            catch(PDOException $pe){

            }


    }

    


?>
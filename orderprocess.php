<?php
    include("foodid.php");
    include("connection.php");
    if(isset($_POST['submit'])){
        $street_address=$_POST['Street'];
        $Apt=$_POST['Apt'];
        $State=$_POST['State'];
        $code=$_POST['code'];
        $delivery=$_POST['delivery'];
        $delveryfees=0;
        if($delivery=='standard'){
            $delveryfees=2;
        }else{  
            $delveryfees=4;
        }
        $dishPrice=0;
        $sql="SELECT * FROM food WHERE id IN (".implode(',',$foodid).")";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $dishPrice+=$row['price'];
            }
        }
        $total=$dishPrice+$delveryfees;
        $sql="INSERT INTO userorder ('customerid',`Street Address`, `Apt/Suite/Other`, `State/City`, `Code Postal`,'delivery option','total') VALUES ('".implode(',',$foodid)."','$street_address', '$Apt', '$State', '$code','$delivery','$total')";
        header("Location : payment.php");
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header("Location: payment.php?foodid=" . $id . "&value=Next Step");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<?php
    
    $students = [
        
        ['name' => "Root" , 'age' => 20],
        ['name' => "Root1" , 'age' => 25, 'gpa'=>3.4],
        ['name' => "Root2" , 'age' => 30]
    ];

?>

<table border="1px" width="300px" align="center" cellpadding="3px">
<p align="center" style="font-size:30px" >Students</p>
    <tr bgcolor="lightgray">
        <th>Name</th>
        <th>Age</th>
        <th>GPA</th>
    </tr>
    
    <tr>
        <td><?php echo $students[0]['name']?></td>
        <td><?php echo $students[0]['age']?></td>
    </tr>
    
     <tr>
        <td><?php echo $students[1]['name']?></td>
        <td><?php echo $students[1]['age']?></td>
        <td><?php echo $students[1]['gpa']?></td>
    </tr>
    
     <tr>
        <td><?php echo $students[2]['name']?></td>
        <td><?php echo $students[2]['age']?></td>
    </tr>
</table>
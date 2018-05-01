<li>
    <div><p> Sed ut perspiciatis, uest et expedita <br/>distinctio. ...  doloremque laudantium </p></div>
    <ul>
        <li>
            <div><p>  quia dolor sit asperiores repellat<br/>…velit, sed quia non-numquam </p></div>
        </li>
        <li>
            <div><p> At vero eos et accusamus et <br/>...ucimus, qui blanditiis</p></div>
            <ul>
                <li>
                    <div><p> Sub-3 asdasdasdasdasdasd<br/> asdasdasd</p></div>
                </li>
                <li>
                    <div><p> Et harum quidem rerum …<br/>et expedita distinctio.</p></div>
                </li>
            </ul>  
        </li>
    </ul>   
</li>

<?php

function tree($fetch,$con,$id) {
    $node_id= $fetch['node_id'];
    $desc = $fetch['description'];    
    echo "<li><div><p>$desc</p></div>";
    $query2= mysqli_query($con, "SELECT * FROM `nodes` WHERE project_id= $id AND parent_id= $node_id AND isroot=0");
    if (mysqli_num_rows($query2)!=0){
        echo "<ul>";
        while ($fetch2 = mysqli_fetch_assoc($query2)){
            tree($fetch2,$con,$id);
        }
        echo "</ul>";
    }
    echo "</li>";
}
$query= mysqli_query($con, "SELECT * FROM `nodes` WHERE project_id= $id AND isroot=1");
if (mysqli_num_rows($query)!=0){
    while ($fetch = mysqli_fetch_assoc($query)){
        echo "<ul>";
        tree($fetch,$con,$id);
        echo "</ul>";
    }
}
else{
    echo "<p>No node found.</p> <a href=\"\">Insert one now</a>";
}
?>
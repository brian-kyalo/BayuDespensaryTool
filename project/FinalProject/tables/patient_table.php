<html>
<head>
<title>Bayu Dispensary</title>

<style>
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

}
body{
min-height: 100vh;
background-image: url(../images/background.jpg);
background-size: cover;
background-position: center;
background-repeat: no-repeat;
display: flex;
justify-content: center;
align-items: center;
}

.tbl_header {
text-align: center;
width: 100%;
height: 15%;
background-color: #fff6;
padding: .8rem 1rem;
}
.tbl_body{
width: 95%;
max-height: calc(90%-1rem);
background-color: #fffb;
margin: 1rem auto;
border-radius: .6rem;
overflow: auto;

}

.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{
    visibility: visible;
}
td img{
width: 36px;
height: 36px;
margin-right: .5rem;
border-radius: 50%;
vertical-align: middle;
}
main.table{
width: 70vw;
height: 90vh;
background-color: #fff5;
backdrop-filter: blur(5px);
box-shadow: 0 .4rem .8rem #0005;
border-radius: .8rem;
overflow: hidden;

}
table, th, td{
text-align: left;
border-collapse: collapse;
padding: 1rem;
}
thead th{
width: 49vw;
position: sticky;
top: 0;
left: 0;
background-color: #d5d1defe;
}
tbody tr:hover {
background-color: #fff8;
}
@media (max-width: 1000px){
td:not(:first-of-type){
    min-width: 12.1rem;
}
}    

.inline {
    
    display: flex;
    position: center;
    float: right;
    margin: 20px 0px;
}

input,
button {

    height: 34px;
}


</style>
</head>
<body>
<?php
require_once "connection.php";

$per_page_record = 3;

if (isset($_GET["page"])) {
$page = $_GET["page"];
} else {
$page = 1;
}

$start_from = ($page - 1) * $per_page_record;

$query = "SELECT * FROM patient LIMIT $start_from, $per_page_record";
$result = mysqli_query($conn, $query);
?>
<main class="table">
    <section class="tbl_header">
        <h1>Bayu Dispensary|Records</h1>
        <p>The table Displays Patient Information</p>
    </section>
    <section class="tbl_body">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>

                    <td><?php echo $row["patientId"]; ?></td> 
                    <td><img src="../images/name.jpg" alt=""></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["password"]; ?></td>
                    <td>
                        <a style= "color:rgb(5, 110, 101); 
                                    font-size: .8em; 
                                    font-family: Arial, Helvetica, sans-serif;
                                    font-style: normal;
                                     text-decoration: underline;
                                    font-weight: 150;"
                                    href="update_patient.php?id=<?php echo $row["patientId"]; ?>">Update</a>
                                    <ion-icon style="position: relative;
                                    
                                    font-size: 1.em;
                                    top: 4px;
                                    margin-top: 2px;
                                    color:rgb(5, 110, 101);" 
                                    name="enter-outline"></ion-icon>
                        <a style= " color:rgb(5, 110, 101); font-size: .8em;
                                    font-family: Arial, Helvetica, sans-serif;
                                    font-style: normal;
                                    text-decoration: underline;
                                    font-weight: 150;
                                    " 
                                    href="delete_patient.php?id=<?php echo $row["patientId"]; ?>">Delete</a>
                                    <ion-icon name="trash-outline"
                                    style="position: relative;
                                    font-size: 1.em;
                                    top: 4px;
                                    color:rgb(5, 110, 101);" ></ion-icon>
</td>
                </tr>
            <?php
            };
            ?>
            </tbody>
        </table>
        <div class="pagenation" style="
        postion: relative;
        display: flex;
        justify-content: baseline;
        align-items: baseline;
        margin-top: 50px;
        margin-left: 320px ;">
        <?php
        // Counting the number of Records in the database.
        $query = "SELECT COUNT(*) FROM patient";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
        $total_records = $row[0];

        echo "<br>";
        // Number of pages required to hold the NO of records.
        $total_pages = ceil($total_records / $per_page_record);
        $pagLink = "";

        if ($page >= 2) {
            echo "<a href='patient_table.php?page= " . ($page - 1) . "'>  <<Prev </a>";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                $pagLink .= "<a class='active' href='patient_table.php?page=" . $i . "'>" . $i . " </a>";
            } else {
                $pagLink .= "<a href='patient_table.php?page=" . $i . "'> " . $i . " </a>";
            }
        };
        echo $pagLink;

        if ($page < $total_pages) {
            echo "<a href='patient_table.php?page=" . ($page + 1) .  "'>  Next>> </a>";
        }
        ?>
    </div>

    <div class="inline" style=" margin-top: 25px;
    align-items: baseline; ">
        <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
        <button onClick="go2Page();">Go</button>
    </div>
</div>
</div>

<script>
function go2Page() {
    var page = document.getElementById("page").value;
    page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
    window.location.href = 'patient_table.php?page=' + page;
}
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</div>
</section>
</main>

</body>
</html>

   
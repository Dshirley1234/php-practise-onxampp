
<table>
        <tr>
            <th>ID</th>
            <th><button id="sortByName">Name</button></th>
            <th>Age</th>
            <th>Type</th>
            <th>#</th>
            <th>#</th>
        </tr>


<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td>
        <td><?= $row["age"] ?></td>
        <td><?= $row["type"] ?></td>
        <td><a href="edit.php?id=<?= $row["id"]?>" class="btn btn-primary">Edit</a></td>
        <td><a href="delete-action.php?id=<?= $row["id"]?>" class="btn btn-danger">Delete</a></td>
    
    </tr>
<?php endwhile; ?>


</table>
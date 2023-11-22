
<table>
        <tr>
            <th><form action="<?= $file_name?>" method="POST">
            <button type="submit" value="id" name="sortBy" class="btn btn-success">ID</button></form></th>

            <th><form action="<?= $file_name?>" method="POST">
            <button type="submit" value="name" name="sortBy" class="btn btn-success">Name</button></form></th>

            <th><form action="<?= $file_name?>" method="POST">
            <button type="submit" value="age" name="sortBy" class="btn btn-success">age</button></form></th>

            <th>Type</th>
            <th></th>
            <th></th>
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
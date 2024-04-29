<?php include("tablequery.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div
        class="table-responsive"
    >
        <table
            class="table table-striped table-hover table-borderless table-primary align-middle"
        >
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach($row as $row){ ?>
                <tr
                    class="table-primary"
                >
                    <td scope="row"><?php echo $row['id']; ?></td>
                    <td><img src="uploads/<?php echo $row['image']; ?>" alt="" srcset=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="update.php?id=<?php echo $row['id']; ?>"
                        role="button"
                        >Edit</a
                        >
                        <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="?del=<?php echo $row['id']; ?>"
                        role="button"
                        >Delete</a
                        >
                </td>
                </tr>
                <?php }?>
                </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
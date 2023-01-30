<?php
include("./common/header.php");
include("./common/db.php");
?>


<div>

    <div class="row g-0 mt-3">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="bg-white shadow-sm rounded">
                <div class="custom-nav-bg text-center text-white p-2">
                    <h5>All Volunteers</h5>
                </div>
                <div class="p-2">
                    <?php
                    $sql = "SELECT * FROM volunteers, events, users WHERE volunteers.event_id = events.id AND volunteers.volunteer_id = users.id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <a class="text-decoration-none" href="event_details.php?id=<?= $row['id'] ?>">
                            <div class="shadow-sm bg-white p-2 mb-2">
                                <div class="row g-2">
                                    <div class="col-2">
                                        <img src="uploads/<?= $row['event_image'] ?>" class="w-100">
                                    </div>
                                    <div class="col-10">
                                        <table class="m-0 px-2 text-dark fw-bold w-100">
                                            <tbody>
                                                <tr class="bg-light border-color-white">
                                                    <td><?= $row["name"] ?></td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td><?= $row["event_name"] ?></td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td><?= $row["email"] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>

</div>

<?php
include("./common/footer.php")
?>
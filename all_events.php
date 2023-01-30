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
                    <h5>All Events</h5>
                </div>
                <div class="p-2">
                    <?php
                    $sql = "SELECT * FROM events";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <a class="text-decoration-none" href="event_details.php?id=<?= $row['id'] ?>">
                            <div class="shadow-sm bg-light p-2 mb-2">
                                <div class="row g-3">
                                    <div class="col-2">
                                        <img src="uploads/<?= $row['event_image'] ?>" class="w-100">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="m-0">
                                            <?= $row["event_name"] ?>
                                        </h6>
                                        <p class="m-0"><i class="fa-solid fa-clock"></i> <?= date("m/d/y g:i A", strtotime($row['event_starting_time'])); ?></p>
                                    </div>
                                    <div class="col-2 text-end">

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
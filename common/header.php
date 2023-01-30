<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="resources/style.css" />
</head>

<body>
    <nav style="z-index: 999;" class="navbar position-fixed top-0 start-0 end-0 custom-nav-bg navbar-expand-lg text-white border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
            </div>
        </div>
    </nav>

    <div class="row g-0">
        <div style="z-index: 1;" class="col-md-2 custom-nav-bg d-none d-md-block position-fixed bottom-0 top-0 start-0 end-0 shadow-sm border-end">
            <div class="p-2"></div>
            <div class="mt-5 w-100">
                <a class="p-2 custom-sidebar-item border-bottom text-decoration-none d-block " href="/volunteer_admin"><i class="fa-solid fa-screwdriver-wrench"></i> Dashboard</a>
                <a class="p-2 custom-sidebar-item border-bottom text-decoration-none d-block " href="/volunteer_admin/create_new_event.php"><i class="fa-solid fa-calendar-days"></i> Create New Event</a>
                <a class="p-2 custom-sidebar-item border-bottom text-decoration-none d-block " href="/volunteer_admin/all_events.php"><i class="fa-regular fa-calendar-check"></i> All events</a>
                <a class="p-2 custom-sidebar-item border-bottom text-decoration-none d-block " href="/volunteer_admin/all_volunteers.php"><i class="fa-solid fa-users"></i> All Volunteers</a>
            </div>
        </div>
        <div class="col-md-2 d-none d-md-block">

        </div>
        <div class="col-md-10 mt-5 p-2">
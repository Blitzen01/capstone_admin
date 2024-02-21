<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Documentation</title>

        <link rel="stylesheet" href="../assets/style/style.css">
        <style>
        </style>
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div id="admin-body" class="pt-2">
            <div class="row pt-5">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <section>
                        <h1 id="pageHeader">Documentation</h1>
                        <div class="container-fluid">
                            <div class="row" id="documentaion">
                                <div class="col-lg-3">
                                    <?php include "../adminNavigation/documentation_sidebar.php";?>
                                </div>
                                <div class="col-lg-9">
                                    <div id="documentaion_content">
                                        <div class="row pb-5 pe-2">
                                            <h3>Admin Content</h3>
                                            <div id="analytics" class="border-bottom m-2 pb-5">
                                                <h4>Analytics</h4>
                                                <p>Click <button class="bg-green">Dashboard</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Analytics</button> . </p>
                                            </div>
                                            <div id="collection" class="border-bottom m-2 pb-5">
                                                <h4>Collection</h4>
                                                <p>Click <button class="bg-green">Dashboard</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Collection</button> . </p>
                                            </div>
                                            <div id="user_satisfaction" class="border-bottom m-2 pb-5">
                                                <h4>User Satisfaction</h4>
                                                <p>Click <button class="bg-green">Dashboard</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> User Satisfaction</button> . </p>
                                                <p>For generate reports click <button class="btn-white">CSV</button> for downloading CSV file. 
                                                Click <button class="btn-white">EXCEL</button> for downloading EXCEL file. 
                                                Click <button class="btn-white">PDF</button> for downloading PDF file. 
                                                Click <button class="btn-white">PRINT</button> for printing.</p>
                                            </div>
                                            <div id="book_reservation" class="border-bottom m-2 pb-5">
                                                <h4>Book Reservation</h4>
                                                <p>Click <button class="bg-green">Circulation</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Book Reservation</button> . </p>
                                                <p>For process reservation click <button class="btn btn-success">Pick up</button>. A modal will pop up to check the details click <button class="btn btn-success">Pick up</button> to process</p>
                                                <p>For decline reservation click <button class="btn btn-danger">Decline</button>. A modal will pop up to check the details click <button class="btn-white">Select an option</button> to select the reason of declining request and click <button class="btn btn-danger">Decline</button> to decline reservation.</p>
                                            </div>
                                            <div id="book_borrowed" class="border-bottom m-2 pb-5">
                                                <h4>Book Borrowed</h4>
                                                <p>Click <button class="bg-green">Circulation</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Book Borrowed</button> . </p>
                                                <p>For process returned book click <button class="btn btn-success">Returned</button> .</p>
                                                <p>For process missing book click <button class="btn btn-warning">Missing</button> .</p>
                                                <p>For process damaged book click <button class="btn btn-danger">Damaged</button> .</p>
                                            </div>
                                            <div id="book_transaction" class="border-bottom m-2 pb-5">
                                                <h4>Book Transaction</h4>
                                                <p>Click <button class="bg-green">Circulation</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Book Transaction</button> . </p>
                                                <p>For generate reports click <button class="btn-white">CSV</button> for downloading CSV file. 
                                                Click <button class="btn-white">EXCEL</button> for downloading EXCEL file. 
                                                Click <button class="btn-white">PDF</button> for downloading PDF file. 
                                                Click <button class="btn-white">PRINT</button> for printing.</p>
                                            </div>
                                            <div id="list" class="border-bottom m-2 pb-5">
                                                <h4>User List</h4>
                                                <p>For checking user accounts Click <button class="bg-green">User Accounts</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> list</button> . </p>
                                            </div>
                                            <div id="view" class="border-bottom m-2 pb-5">
                                                <h4>User View</h4>
                                                <p>For checking library visitors Click <button class="bg-green">User Accounts</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> View</button> . </p>
                                            </div>
                                            <div id="opac_search" class="border-bottom m-2 pb-5">
                                                <h4>OPAC Search</h4>
                                                <p>For viewing contents on <strong>OPAC Search</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> OPAC Search</button> . </p>
                                                <p>For editing <strong>background picture</strong> click <button class="btn text-success"><i class='fa-solid fa-pen-to-square'></i></button> on the bottom left of the picture. A modal will pop up, upload the new picture and click <button class="btn btn-success">Save changes</button> .</p>
                                                <p>For updating  <strong>Library Hours</strong> click <button class="btn text-success"><i class='fa-solid fa-pen-to-square'></i></button> . A modal will pop up, complete all the field then click <button class="btn btn-success">UPDATE</button> .</p>
                                                <p>For updating <strong>Overdue Fines</strong> click <button class="btn text-success"><i class='fa-solid fa-pen-to-square'></i></button> . A modal will pop up, complete all the field then click <button class="btn btn-success">UPDATE</button> .</p>
                                            </div>
                                            <div id="home" class="border-bottom m-2 pb-5">
                                                <h4>Home</h4>
                                                <p>For viewing announcements on <strong>Home</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Home</button> . </p>
                                                <p>For posting <strong>New Announcements</strong> Click <button class="btn-white rounded-pill">CREATE ANNOUNCEMENT</button> . Fill up the form and click <button class="btn">Post</button> <span>Note: <strong>The Title/Caption field must fill to process the post.</strong></span></p>
                                                <p>For Deleting Announcements Click <button class="btn border"><i class="fa-solid fa-x"></i></button>. A modal will pop up to confirm deletion click <button class="btn btn-danger">Delete</button></p>
                                            </div>
                                            <div id="services" class="border-bottom m-2 pb-5">
                                                <h4>Services</h4>
                                                <p>For viewing <strong>Services</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Services</button> . </p>
                                                <p>
                                                    <span>In <strong>adding new servces</strong> click <button class="btn-white">+</button> to open the text editor. Input the services in the text box provided.</span>
                                                        <span>Make sure to input the complete discription of the services before saving.</span>
                                                        <span>Here is some example of a full description of a service: </span>
                                                        <br><br>
                                                        <span>Example. <br>
                                                        <h2>Title of service</h2>
                                                        <span>description of the service.</span> <br> 
                                                        <h4 class="ps-3">Sub heading of the service</h4>
                                                        <span class="ps-5">description of the sub heading.</span> 
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>In <strong>Editing/Updating</strong> services click <button class="btn text-success"><i class="fa-solid fa-pen-to-square"></i> Edit</button> above the service you want to edit to make the text box editable. After editing make sure to click the <button class="btn btn-success">SAVE</button> button to make sure that the service will be edited/updated.</span>
                                                </p>
                                                <p>
                                                    <span>In <strong>Deleting</strong> services click <button class="btn text-danger"><i class="fa-solid fa-trash"></i> Delete</button> above the service you want to edit to make the text box editable. After editing make sure to click the <button class="btn btn-warning">DELETE</button> button to make sure that the service will be deleted.</span>
                                                </p>
                                            </div>
                                            <div id="acquisition" class="border-bottom m-2 pb-5">
                                                <h4>Acquisition</h4>
                                                
                                            </div>
                                            <div id="documentation" class="border-bottom m-2 pb-5">
                                                <h4>Documentation</h4>
                                                <p>For viewing <strong>Documentation</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Documentation</button> . </p>
                                            </div>
                                            <div id="events" class="border-bottom m-2 pb-5">
                                                <h4>Events</h4>
                                                <p>For viewing current event today go to <strong>Calendar of Events</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Calendar of Events</button> . </p>
                                                <p>For adding events click <button class="btn btn-success">Add Event</button>. A modal will popup, fill out all the fields and click <button class="btn btn-success">Submit</button> to add new event.</p>
                                            </div>
                                            <div id="about" class="border-bottom m-2 pb-5">
                                                <h4>About</h4>
                                                <p>For viewing contents on <strong>About</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> About</button> . </p>
                                                <p>For editing <strong>Vision / Mission</strong> Click <button class="btn text-success"><i class="fa-solid fa-pen-to-square"></i> Edit</button> a modal with the current vision / mission will pop up. Edit vision and mission and click <button class="btn btn-success">Save Changes</button> to update vision / mission</p>
                                                <p>For adding new <strong>Library Objective / Library Rules and Regulation</strong> Click <button class="btn text-primary"><i class="fa-regular fa-square-plus"></i></button> . A modal will pop up. Input the new Library Objective / Library Rules and Regulation and click <button class="btn btn-success">Add</button></p>
                                                <p>For editing <strong>Library Objective / Library Rules and Regulation</strong> Click <button class="btn text-success"><i class="fa-solid fa-pen-to-square"></i> Edit</button> a modal with the current Library Objective / Library Rules and Regulation will pop up. Edit Library Objective / Library Rules and Regulation and click <button class="btn btn-success">Save Changes</button> to update Library Objective / Library Rules and Regulation</p>
                                                <p>For deleting <strong>Library Objective / Library Rules and Regulation</strong> Click <button class="btn text-danger"><i class="fa-solid fa-trash"></i> Delete</button> a modal with the current Library Objective / Library Rules and Regulation will pop up. to confirm Library Objective / Library Rules and Regulation and click <button class="btn btn-danger">Delete</button> to remove Library Objective / Library Rules and Regulation</p>
                                            </div>
                                            <div id="links" class="border-bottom m-2 pb-5">
                                                <h4>Quick Links</h4>
                                                <p>For viewing contents on <strong>Quick Links</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Quick Links</button> . </p>
                                                <p>For adding new <strong>Links</strong> Click <button class="btn text-primary"><i class="fa-regular fa-square-plus"></i></button> . A modal will pop up. Input the new Library Objective / Library Rules and Regulation and click <button class="btn btn-success">Add</button></p>
                                                <p>For editing <strong>Link</strong> Click <button class="btn text-success"><i class="fa-solid fa-pen-to-square"></i> Edit</button> a modal with the current link will pop up to confirm link then click <button class="btn btn-success">Save Changes</button> to update link.</p>
                                                <p>For deleting <strong>Link</strong> Click <button class="btn text-danger"><i class="fa-solid fa-trash"></i> Delete</button> a modal with the link will pop up to confirm link then click <button class="btn btn-danger">Delete</button> to remove link.</p>
                                            </div>
                                            <div id="links" class="border-bottom m-2 pb-5">
                                                <h4>Quick Links</h4>
                                                <p>For viewing contents on <strong>Quick Links</strong> Click <button class="bg-green">Library Pages</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Quick Links</button> . </p>
                                                <p>For adding new <strong>Links</strong> Click <button class="btn text-primary"><i class="fa-regular fa-square-plus"></i></button> . A modal will pop up. Input the new Library Objective / Library Rules and Regulation and click <button class="btn btn-success">Add</button></p>
                                                <p>For editing <strong>Link</strong> Click <button class="btn text-success"><i class="fa-solid fa-pen-to-square"></i> Edit</button> a modal with the current link will pop up to confirm link then click <button class="btn btn-success">Save Changes</button> to update link.</p>
                                                <p>For deleting <strong>Link</strong> Click <button class="btn text-danger"><i class="fa-solid fa-trash"></i> Delete</button> a modal with the link will pop up to confirm link then click <button class="btn btn-danger">Delete</button> to remove link.</p>
                                            </div>
                                            <div id="profile" class="border-bottom m-2 pb-5">
                                                <h4>Profile</h4>
                                                <p>For viewing contents on <strong>Profile</strong> Click <button class="bg-green">Account Settings</button> to toggle the dropdown menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Profile</button> . </p>
                                                <p>If you are a first timer on loging in click the blank image to toggle dropdown menu then click <button class="btn-white">Update profile picture</button> a modal will pop up, upload your picture click <button class="btn btn-success">Save changes</button> .</p>
                                                <p>To see the current profile picture click the image to toggle dropdown menu then click <button class="btn-white">See profile picture</button> a modal will pop up that contains the current profile picture.</p>
                                                <p>To update your current profile picture click the image to toggle dropdown menu then click <button class="btn-white">Update profile picture</button> a modal will pop up, upload your picture click <button class="btn btn-success">Save changes</button .></p>
                                                <p>To remove your current profile picture click the image to toggle dropdown menu then click <button class="btn-white">Remove profile picture</button> a modal will pop up that displays your picture click <button class="btn btn-danger">Remove</button> .</p>
                                                <p><strong>Changing password</strong>, to change your password click <button class="btn text-primary fs-small">change password</button> a modal will pop up, enter your <strong>old password</strong> to enable the next input field. Type your <strong>new password</strong> and it should be 7 keys or higher to enable the next input field. Type again the password for check to <strong>confirm</strong> if it is match from the new password. click <button class="btn btn-success">Save changes</button> to save your new password.</p>
                                                <p><strong>Update Profile/Personal Information</strong>, to update your <strong>profile and personal information</strong> click <button class="btn btn-success">Update Profile/Personal Information</button> a modal will pop up, fill out all the details you want to update <br><br> and click <button class="btn btn-success">Save changes</button> to save your details.</p>
                                            </div>
                                            <div id="personal_info" class="border-bottom m-2 pb-5">
                                                <h4>Personal Information</h4>
                                                <p>For viewing contents on <strong>Personal information</strong> Click <button class="bg-green">Account Settings</button> to toggle the dropup menu then click <button class="btn-white"><i class="fa-solid fa-arrow-right fa-2xs"></i> Personal Info</button> . </p>
                                            </div>
                                            <div id="log_out" class="border-bottom m-2 pb-5">
                                                <h4>Log Out</h4>
                                                <p>For loging out <strong>Admin Page</strong> Click <button class="bg-green">Accounts Settings</button> to toggle the dropup menu then click <button class="bg-green"><i class="fa-solid fa-right-from-bracket"></i> Log Out</button><br><br>A modal will pop up to confirm log out click <button class="btn btn-success">Log out</button> to continue log out.</p>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <h3>User Content</h3>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>







        <script src="../assets/script/script.js"></script>
        <script>
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    </body>
</html>
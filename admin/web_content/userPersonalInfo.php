<div class="row py-1">
    <div class="col-lg-5 col-sm-10">
        <div class="row card px-2 m-1">
            <span><strong>Lastname:</strong> <?php echo $row['user_familyName'];?></span>
        </div>
    </div>
    <div class="col-lg-5 col-sm-10">
        <div class="row card px-2 m-1">
            <span><strong>Firstname:</strong> <?php echo $row['user_givenName'];?></span>
        </div> 
    </div>
    <div class="col-lg-2 col-sm-10">
        <div class="row card px-2 m-1">
            <span><strong>M.I.:</strong> <?php echo $row['user_middleI'];?></span>
        </div>
    </div>
</div>
<div class="row py-1">
    <div class="col-lg-6 col-sm-10">
        <div class="row card px-2 m-1">
            <span><strong>Birthday:</strong> <?php echo $row['user_birthday'];?></span>
        </div>
    </div>
    <div class="col-lg-6 col-sm-10">
        <div class="row card px-2 m-1">
            <span><strong>Gender:</strong> <?php echo $row['user_gender'];?></span>
        </div>
    </div>
</div>
<div class="col-lg-12 col-sm-10">
    <div class="row card px-2 m-1">
        <span><strong>Bio:</strong> <?php echo $row['user_bio'];?></span>
    </div>
</div>
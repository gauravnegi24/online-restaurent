<?php
//https://www.w3schools.com/icons/bootstrap_icons_glyphicons.asp
$title = "Veg";
require ("header.php");
?>
<!-----Container----->

<div class="container">
    <div class="jumbotron">
        <h1>Veg Menu</h1>
        <p>Vegetables are parts of plants that are consumed by humans or other animals as food. The original meaning is
            still commonly used and is applied to plants collectively to refer to all edible plant matter, including the
            flowers, fruits, stems, leaves, roots, and seeds.</p>
    </div>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Momo</td>
                        <td>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                            20
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button></td>
                    </tr>

                    <tr>
                        <td>French Fries</td>
                        <td>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                            20
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button></td>
                    </tr>

                    <tr>
                        <td>Egg Roll</td>
                        <td>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                            20
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button class="btn btn-link">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button></td>
                    </tr>

                </tbody>
            </table>
            <!-- <div class="row">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-default">
                        Search
                    </button>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-link">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-link">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                    <button class="btn btn-link">
                        <span class="glyphicon glyphicon-bin"></span>
                    </button>
                </div>
                <div class="col-sm-4">3</div>
            </div> -->
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>

<!-----end of container---->
<?php
require ("footer.php");
?>
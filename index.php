<!DOCTYPE html>
<html lang="en">

<!--Page with form that takes product data and displays it in a table on the same page-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coalition Test</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Coalition Skills Test</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#table-section">Product Table</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!--Form section-->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                    <!--                Form for entering new product data-->
                    <form id="productForm" action="submit.php" class="js-ajax-php-json" method="post" accept-charset="utf-8" >
                        <!--                    Product name-->

                        <fieldset class="form-group">
                            <div class="col-md-4">
                                <label for="name">Product name</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class='' id="name" name="name" placeholder="Widgety widget" required autofocus />
                            </div>
                        </fieldset>
                        <!--                    Quantity in stock-->
                        <fieldset class="form-group">
                            <div class="col-md-4">
                                <label for="quantity">Quantity</label>
                            </div>
                            <div class="col-md-2">
                                <input type="number" id="quantity" name="quantity" placeholder="144" step="1" min="0" required/>
                            </div>
                        </fieldset>
                        <!--                    Price per item-->
                        <fieldset class="form-group">
                            <div class="col-md-4">
                                <label for="price">Price per item</label>
                            </div>
                            <div class="col-md-2">
                                <input type="number" id="price" name="price" placeholder="19.99" step="0.01" min="0" required/>
                            </div>
                        </fieldset>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <button class="btn btn-default" type="submit" name="submit" onClick="window.location.reload(true)">Submit Form</button>
                        </div>

                    </form>

            </div>
        </div>
    </section>

<!--Table section-->
    <section id="table-section" class="table-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Products Table</h1>
<!--        Table displaying current products from JSON file-->
                    <div class="container" id="table">
            <table class="table table-bordered" id="sum_table">

                <thead class="thead-inverse">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity in stock</th>
                        <th>Price per item</th>
                        <th>Datetime submitted</th>
                        <th>Total value number</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $file = __DIR__ . '/products.json';
                    if (is_readable($file)){
                        $json = json_decode(file_get_contents($file), true);
                        foreach (array_reverse($json, true) as $key => $item) {
                            echo "<tr>
                                                            <td class='pnm'>" . $item['name'] . "</td>
                                                            <td class='qty'>" . $item['quantity'] . "</td>
                                                            <td class='price'>" . $item['price'] . "</td>
                                                            <td class='time'>" . date('jS \of F Y h:i:s A', $key) . "</td>
                                                            <td class='subtot'>" . $item['quantity']*$item['price'] . "</td>
                                                          </tr>";
                        }
                    } else {
                        echo "File not found";
                    }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="total"></td>
                    </tr>
                </tfoot>
            </table>

        </div> <!-- table -->
                </div>
            </div>
        </div>
    </section>


<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Additional JavaScript for form data, column sum and scrolling, Thank You stackoverflow -->
<script src="script.js"></script>

</body>
</html>


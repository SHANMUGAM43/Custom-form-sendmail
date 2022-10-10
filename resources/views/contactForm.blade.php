<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Contact US Form Example - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create three equal columns that floats next to each other https://cdn.shopify.com/s/files/1/0624/6799/7864/files/ezgif.com-gif-maker_1_6687a430-329d-4487-8cee-a3c8720776bc.png*/
        .column {
            float: left;
            width: 50%;
            padding: 100px;
            height: 1800px;
            /* Should be removed. Only for demonstration */
        }

        .sub-column {
            float: left;
            width: 33.3%;


        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
            margin: 1px;
        }

        img {
            top: 626px;
            left: 93px;
            width: 100%;
            height: 30%;
        }

        .head {
            top: 183px;
            left: 680px;
            width: 589px;
            height: 102px;
            /* UI Properties */
            text-align: left;
            font: normal normal normal 38px/50px Open Sans;
            letter-spacing: 0px;
            color: #333333;
            text-transform: capitalize;
            opacity: 1;
        }

        .head2 {
            top: 545px;
            left: 677px;
            width: 523px;
            height: 24px;
            /* UI Properties */
            text-align: left;
            font: normal normal bold 18px/18px Open Sans;
            letter-spacing: 0px;
            opacity: 1;
        }

        .jewelry_type {
            top: 448px;
            left: 701px;
            width: 305px;
            height: 22px;
            /* UI Properties */
            text-align: left;
            font: normal normal normal 16px/14px Open Sans;
            letter-spacing: 0px;
            color: #333333;
            opacity: 1;
        }

        #message {
            /* Layout Properties */
            top: 583px;
            left: 673px;
            width: 595px;
            height: 70px;
            /* UI Properties */
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #D5D5D5;
            opacity: 1;
        }

        #myfile {
            top: 721px;
            left: 677px;
            width: 489px;
            height: 38px;
            /* UI Properties */
            background: #E5E5E5 0% 0% no-repeat padding-box;
            border: 1px solid #4F4F4F;
            border-radius: 5px;
            opacity: 1;

        }

        #sub {
            top: 1325px;
            left: 673px;
            width: 222px;
            height: 52px;
            /* UI Properties */
            background: #DD390D 0% 0% no-repeat padding-box;
            border-radius: 5px;
            opacity: 1;
        }

        button {
            top: 1325px;
            left: 673px;
            width: 222px;
            height: 52px;
            background: #0069ff;
            border-radius: 5px;


        }

        button a {
            text-decoration: none;
            font-size: 15px;
            color: white;

        }

        .j_types_error {
            display: none;
        }

        .describe_error {
            display: none;
        }

        .file_error {
            display: none;
        }

        .j_category_error {
            display: none;
        }

        .g_category_error {
            display: none;
        }

        .price_error {
            display: none;
        }

        .success_result {
            display: none;
        }

        .ajax-loader {
            visibility: hidden;
            position: absolute;
            z-index: +100 !important;
            width: 100px;
            height: 100px;
        }

        .ajax-loader img {
            position: relative;
            top: 50%;
            left: 50%;
	}
       .calendly-badge-content{
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="column ">
            <img src="https://cdn.shopify.com/s/files/1/0624/6799/7864/files/ezgif.com-gif-maker_1.png" alt="Girl in a jacket">
            <br><br>
            <img src="https://cdn.shopify.com/s/files/1/0624/6799/7864/files/ezgif.com-gif-maker_2.png" alt="Girl in a jacket">
            <br><br>
            <img src="https://cdn.shopify.com/s/files/1/0624/6799/7864/files/ezgif.com-gif-maker_1_6687a430-329d-4487-8cee-a3c8720776bc.png" alt="Girl in a jacket">
            <br><br>
        </div>

        <div class="column">

            <form method="POST" id="contactForm" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group" id="j_type">
                    <h3 id="success" class="success_result" style="color: green;">Thank you for contact us. we will contact you shortly.</h3><br>
                    <h2 class="head">DESIGN YOUR PERFECT JEWELERY</h2>
                    <h4 class="head2">What type of jewelry do you want to design?* (can choose multiple)</h4>
                    <span id="j_types_val" class="j_types_error" style="color: red;">Jewelry Type Field is Required </span><br>

                    <label><input id="j_types" type="checkbox" name="jewelry_type[]" value="Pendant"> Pendant</label><br>
                    <label><input id="j_types" type="checkbox" name="jewelry_type[]" value="Necklace or Chain"> Necklace or Chain</label><br>
                    <label><input id="j_types" type="checkbox" name="jewelry_type[]" value="Crest Ring"> Crest Ring</label><br>
                    <label><input id="j_types" type="checkbox" name="jewelry_type[]" value="Wedding Band"> Wedding Band</label><br>
                    <label><input id="j_types" type="checkbox" name="jewelry_type[]" value="Engagement Ring"> Engagement Ring</label><br>
                    <label><input id="j_types" type="checkbox" name="jewelry_type[]" value="Bracelet"> Bracelet</label><br>
                    <label><input id="j_types" type="checkbox" name="jewelry_type[]" value="Cufflinks"> Cufflinks</label><br>

                </div>

                <div class="form-group" id="j_describe">
                    <strong>Please describe your design in as much detail as possible:*</strong>
                    <span id="describe_val" class="describe_error" style="color: red;">Describe Field is Required</span>
                    <textarea id="describe" name="describe" rows="3" class="form-control"></textarea><br>
                </div>

                <div class="form-group" id="j_file">
                    <h4 class="head2">Upload your design, logo, or image for reference:*</h4>
                    <span id="file_val" class="file_error" style="color: red;">File is Required</span>
                    <input class="file" type="file" name="file" placeholder="Choose file" id="file" />
                </div>

                <div class="form-group" id="j_category">
                    <h4 class="head2">Choose the metal you want to use:* (can choose multiple)</h4>
                    <span id="j_category_val" class="j_category_error" style="color: red;">Jewelry Category Field is Required</span> <br>
                    <label><input class="j_category" type="checkbox" name="jewelry_category[]" value="22k gold"> 22k gold</label><br>
                    <label><input class="j_category" type="checkbox" name="jewelry_category[]" value="18k gold"> 18k gold</label><br>
                    <label><input class="j_category" type="checkbox" name="jewelry_category[]" value="14k gold"> 14k gold</label><br>
                    <label><input class="j_category" type="checkbox" name="jewelry_category[]" value="10k gold"> 10k gold</label><br>
                    <label><input class="j_category" type="checkbox" name="jewelry_category[]" value="Platinum"> Platinum</label><br>
                    <label><input class="j_category" type="checkbox" name="jewelry_category[]" value="Silver"> Silver</label><br>
                </div>

                <div class="form-group" id="g_category">
                    <h4 class="head2">Choose the gems you want to use:* (can choose multiple)</h4>
                    <span id="g_category_val" class="g_category_error" style="color: red;">Gems Category Field is Required </span><br>
                    <label><input class="g_category" type="checkbox" name="gems_category[]" value="Natural diamonds"> Natural diamonds</label><br>
                    <label><input class="g_category" type="checkbox" name="gems_category[]" value="Lab Grown Diamonds"> Lab Grown Diamonds</label><br>
                    <label><input class="g_category" type="checkbox" name="gems_category[]" value="Colored Gemstones"> Colored Gemstones</label><br>
                </div>

                <div class="form-group" id="j_price">
                    <h4 class="head2">Estimated Ideal Budget (custom designs start at $5,000):*</h4>
                    <span id="price_val" class="price_error" style="color: red;">Jewelry price Field is Required</span><br>
                    <label><input type="radio" name="price" value="$5,000 - $10,000"> $5,000 - $10,000</label><br>
                    <label><input type="radio" name="price" value="$10,000 - $20,000"> $10,000 - $20,000</label><br>
                    <label><input type="radio" name="price" value="$20,000 - $50,000"> $20,000 - $50,000</label><br>
                    <label><input type="radio" name="price" value="$50,000"> $50,000</label><br>
                </div>

                <div class="form-group">
                    <h4 class="head2"><b>Note:</b>You will be able to provide additional details to the designer directly</h4><br>
                    <button id="submit" class="btn" style="background:#FF8800;" onclick="myFunction(event)">Submit</button>
                </div>
                <div class="ajax-loader">
                    <img src="b4d657e7ef262b88eb5f7ac021edda87.gif" class="img-responsive" />
                </div>

            </form>

            <!-- Calendly badge widget begin -->
            <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
            <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
            <script type="text/javascript">
                window.onload = function() {
                    Calendly.initBadgeWidget({
                        url: 'https://calendly.com/shanmugam-p',
                    });
                }
            </script>
            <script>
                function myFunction(e) {
                    e.preventDefault();

                    //jewelry_type
                    var jewelryTypeValue = []
                    var checkboxes = document.querySelectorAll('input[name="jewelry_type[]"]:checked')
                    for (var i = 0; i < checkboxes.length; i++) {
                        jewelryTypeValue.push(checkboxes[i].value)
                    }

                    if (jewelryTypeValue == '') {
                        var j_type = document.getElementById("j_types_val");
                        j_type.classList.remove("j_types_error");
                    } else {
                        var j_type = document.getElementById("j_types_val");
                        j_type.classList.add("j_types_error");
                    }

                    //describe
                    if (document.getElementById("describe").value == '') {
                        var describe = document.getElementById("describe_val");
                        describe.classList.remove("describe_error");

                    } else {
                        var describe = document.getElementById("describe_val");
                        describe.classList.add("describe_error");

                        var describeValue = document.getElementById("describe").value;
                    }

                    //file
                    if (document.getElementById("file").files[0] == null) {
                        console.log('if');
                        var file = document.getElementById("file_val");
                        file.classList.remove("file_error");
                    } else {
                        console.log('else');
                        var file = document.getElementById("file_val");
                        file.classList.add("file_error");

                        var imageValue = document.getElementById("file").files[0];
                    }

                    //jewelry_category
                    var jewelryCategoryValue = []
                    var checkboxes1 = document.querySelectorAll('input[name="jewelry_category[]"]:checked')
                    for (var i = 0; i < checkboxes1.length; i++) {
                        jewelryCategoryValue.push(checkboxes1[i].value)
                    }

                    if (jewelryCategoryValue == '') {
                        var j_category = document.getElementById("j_category_val");
                        j_category.classList.remove("j_category_error");
                    } else {
                        var j_category = document.getElementById("j_category_val");
                        j_category.classList.add("j_category_error");
                    }

                    //gems_category
                    var gemsCategoryValue = []
                    var checkboxes2 = document.querySelectorAll('input[name="gems_category[]"]:checked')
                    for (var i = 0; i < checkboxes2.length; i++) {
                        gemsCategoryValue.push(checkboxes2[i].value)
                    }

                    if (gemsCategoryValue == '') {
                        var g_category = document.getElementById("g_category_val");
                        g_category.classList.remove("g_category_error");
                    } else {
                        var g_category = document.getElementById("g_category_val");
                        g_category.classList.add("g_category_error");
                    }

                    //price
                    if (document.querySelector('input[name="price"]:checked') == null) {

                        var price = document.getElementById("price_val");
                        price.classList.remove("price_error");
                    } else {
                        var price = document.getElementById("price_val");
                        price.classList.add("price_error");

                        var priceValue = document.querySelector('input[name="price"]:checked').value;
                    }

                    console.log(jewelryTypeValue);
                    console.log(describeValue);
                    console.log(imageValue);
                    console.log(jewelryCategoryValue);
                    console.log(gemsCategoryValue);
                    console.log(priceValue);


                    var formData = new FormData($('#contactForm')[0]);

                    formData.append('tax_file', $('input[type=file]')[0].files[0]);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "https://proclamationjewelryshopify.enterpriseapplicationdevelopers.com/api/contact-us",
                        type: "POST",
                        beforeSend: function() {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {


                            var success = document.getElementById("success");
                            success.classList.remove("success_result");

                            $('.calendly-badge-content').trigger('click');

                            document.getElementById("contactForm").reset();
                        },
                        complete: function() {
                            $('.ajax-loader').css("visibility", "hidden");

                        }
                    });

                }
            </script>
        </div>
    </div>
</body>

</html>

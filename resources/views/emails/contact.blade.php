<h2 style="text-align: center; color: red;">Hey, It' Proclamation jewelry</h2>

<h2 style="text-align: center; color: green">Jewelry details: </h2><br><br>

<strong style="color: black;">Jewelry Type: </strong>
<?php
$str = json_decode($data->jewelry_type);

foreach ($str as $value) {
    echo "$value" . ", ";
}
?><br><br>
<strong style="color: black;">Describe: </strong>{{ $data->describe }} <br><br>
<strong style="color: black;">Jewelry Category: </strong>
<?php
$str = json_decode($data->jewelry_category);

foreach ($str as $value) {
    echo "$value" . ", ";
}
?><br><br>
<strong style="color: black;">Gems Category: </strong>
<?php
                                $str = json_decode($data->gems_category);

                                foreach ($str as $value) {
                                    echo "$value" . ", ";
                                }
                                ?><br><br>
<strong style="color: black;">Price: </strong>{{ $data->price }} <br><br>
<strong style="color: black;">Image Design: </strong><br>

<img src="{{ $data->file }}" alt="attached image"><br><br>

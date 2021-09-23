<?php

$sql =" SELECT * FROM prescription WHERE patient_id = '$login_id' ORDER BY created_at DESC ";


 $connection -> query($sql);

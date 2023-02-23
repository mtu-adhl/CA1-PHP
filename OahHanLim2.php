<title>Download Speed Calculator</title>
<body>
<h1>Download Speed Calculator by ADHL</h1>
<?php
    $checked = null;
    function calcTime(float $fileSize, int $speed) : float
    {
        return $fileSize * (1024 / $speed / 60);
    }

    if (isset($_POST['submit'])) {
        if (is_numeric($_POST['fileSize']) != 1) echo '<script>alert("Please enter numeric values!")</script>';
        $fileSize = (float) $_POST['fileSize'];
        $speed = (int) $_POST['speed'];
        ($speed == 140) ? $checked = 'r1' : $checked = 'r2';
        $time = number_format(calcTime($fileSize, $speed), 2);
    }
?>
<form action="OahHanLim2.php" method="post">
<label>Enter file size in MB:
    <input type="text" name="fileSize" value="<?php echo ( isset($_POST['fileSize']) ) ? $_POST['fileSize'] : 0 ?>" >
</label>
<label>140 Kb/s
    <input type="radio" name="speed" value="140" <?php echo ($checked == 'r1') ? 'checked' : 'unchecked' ?> required>
</label>
<label>200 Kb/s
    <input type="radio" name="speed" value="200" <?php echo ($checked == 'r2') ? 'checked' : 'unchecked' ?> required>
</label>
<input type="submit" name="submit" value="File Size">
<label>It will take:
    <input type="text" name="time" value="<?php echo $time ?? 0.00 ?>" size="1">
     minute(s) to download
</label>
</form>
</body>





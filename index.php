<?PHP

$file = 'file.txt';

$contents = file_get_contents($file);
$pattern = "/(?<=\[)[^]]+(?=\])/";

if (preg_match_all($pattern, $contents, $matches)) {
    implode("<br />", $matches[0]);
} else {
    $matches[0]= "No matches found";
    fclose ($file); 
}

foreach ($matches as $value) {
    debug_to_console($value);   
}


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode('\n', $output);

    echo '<script>console.log("Debug Objects: ' . $output . '" );</script>';
}

?>
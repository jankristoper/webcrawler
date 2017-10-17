<?php
set_time_limit(10000);
$url = $_GET["url"];

function crawl($url){
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML(file_get_contents($url));
    global  $crawledLinks;
    $output = array();
    $linklist = $doc->getElementsByTagName('a');

    foreach ($linklist as $link){
            $fetch = $link->getAttribute("href");
        if(substr($fetch,0,1) == "/" && substr($fetch,0,2) != "//") {
            $fetch = parse_url($url)["scheme"] . "://" . parse_url($url)["host"] . $fetch;
        }
        else if(substr($fetch,0,2) == "//") {
            $fetch = parse_url($url)["scheme"] . "://" . $fetch;
        }
        else if(substr($fetch,0,2) == "./") {
            $fetch= parse_url($url)["scheme"]."://".parse_url($url)["host"].dirname(parse_url($url)["path"]).substr($fetch, 1);
        }
//        else if(substr($fetch,0,2) == "#") {
//            $fetch = parse_url($url)["scheme"]."://".parse_url($url)["host"].parse_url($url)["path"].$fetch;
//        }
        else if(substr($fetch,0,3) == "../") {
            $fetch = parse_url($url)["scheme"]."://".parse_url($url)["host"]."/".$fetch;
        }
        else if(substr($fetch,0,11) == "javascript:") {
            continue;
        }
        else if(substr($fetch,0,5) != "https" && substr($fetch,0,4) != "http") {
            $fetch = parse_url($url)["scheme"] . "://" .parse_url($url)["host"]."/".$fetch;
        }

        $output[] = $fetch;
    }

    return json_encode($output);
}
header('Content-Type: application/json');
echo crawl($url);




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="semantic/semantic.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="semantic/semantic.js"></script>
    <title>Web Crawler</title>
</head>
<body>
        <div class="ui raised very padded container segment">
            <h2 class="ui header">Web Crawling</h2>
            <div class="field">
                <div class="ui pointing below label">
                    Enter the url
                </div>
            </div>
            <div class="ui labeled input">
                <div class="ui label">
                    http://
                </div>
                <input type="text" name="site" id="site" placeholder="mysite.com">
            </div>
            <button class="ui primary button " id="crawl">Crawl</button>

            <h4 class="ui horizontal divider header">
                <i class="archive icon"></i>
                Results
            </h4>




            <table class="ui striped table" id="siteTable">
                <thead>
                <tr>
                    <th>Sites</th>
                </tr>

                </thead>
                <tbody>
                </tbody>
            </table>

        </div>

        <script src="semantic/crawl.js"></script>
</body>
</html>
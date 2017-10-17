
$('#crawl').click(function(){
    var url = $('#site').val();
    $("#siteTable  > tbody").find("tr").remove();
    $('#loader').addClass("loader ui active inline centered");
    $("#siteTable  > tbody:last-child").append("<tr><td><div class='loader ui active inline centered'></div><h3>Please wait...</h3></td></tr>")
    $.get('crawler.php?url='+url, function(result){
        $("#siteTable  > tbody").find("tr").remove();
        $.each(result, function(key, value){
            $("#siteTable  > tbody:last-child").append("<tr><td>"+value+"</td></tr>")
        });

    });

});

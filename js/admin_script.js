 jQuery(document).ready(function($){
    $($(".wrap .page-title-action")[0]).after("<a class='add-new-h2 xml-import'>Import XML</a>");
    $('.xml-import').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url:'/wp-content/plugins/sparrow-auto/importer.php?import=true',
        }).done(function(data){
            var textContent = data.toString();
            if (textContent == "true"){
                location.reload();
            }else{
                alert(data);
            }
        });
    });
});
// before in delete button
$('.delete').click(function()
{
    if (confirm('Delete article?')) {
        var url = $(this).val();
        $.ajax({
            url: url,
            type: 'post',
            data: {},
            success: function(result) {
                //document.location.reload(true);
                var viewPageURL = document.location.href;
                //console.log(viewURL);
                document.location.href = viewPageURL;
            },
            error: function(xhr) {
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        });
    };
});

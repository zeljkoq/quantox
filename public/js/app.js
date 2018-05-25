function setMessage(type, data)
{
    if ('message' in data && type != null)
    {
        if (type === 'error')
        {
            type = 'danger';
        }

        $('#messages').addClass('alert-'+type);
        $('#messages').text(data.message);
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
            $('#messages').text('');

        }, 3000);
    }
}
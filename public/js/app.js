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
            $('#messages').text('');
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
            
        }, 3000);
    }
}
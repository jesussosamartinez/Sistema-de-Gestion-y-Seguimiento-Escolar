$("#form-login").on('submit',function(e)
{
	e.preventDefault();
    user=$("#email").val();
    password=$("#password").val();

    $.post("../ajax/usuario.php?op=verificar",
        {"user" : user,"password" : password},
        function(data)
    {
        if (data!="null")
        {
            $(location).attr("href","home.php");            
        }
        else
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Usuario y/o Contraseña incorrectos',
                
              })
        }
    });
})

    var t;
    window.onload = resetTimer;
    // DOM Events
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    function logout() {
        //alert("La sesión se ha cerrado por inactividad.");
        location.href = '../Controlador/cerrarS.php';
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout, 7200000)
        // 1000 milisec = 1 sec, se cierra despues de 2hrs
    }
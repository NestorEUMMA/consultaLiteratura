function buscar(){

    var descripcion = document.getElementById('buscardescripcion').value;
    var autor = document.getElementById('buscarautor').value;
    var editorial = document.getElementById('buscareditorial').value;
    var grupos = document.getElementById('buscargrupos').value;
    var division = document.getElementById('buscardivision').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'buscar.php';

    data.append("descripcion", descripcion);
    data.append("autor", autor);
    data.append("editorial", editorial);
    data.append("grupos", grupos);
    data.append("division", division);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){
        var cajadatos = document.getElementById('datos');
        cajadatos.innerHTML = e.target.responseText;

    }, false);
}
 
window.addEventListener('load', function(){
    document.getElementById('buscardescripcion').addEventListener('input', buscar, false);
    document.getElementById('buscarautor').addEventListener('input', buscar, false);
    document.getElementById('buscareditorial').addEventListener('input', buscar, false);
    document.getElementById('buscargrupos').addEventListener('input', buscar, false);
    document.getElementById('buscardivision').addEventListener('input', buscar, false);
}, false);

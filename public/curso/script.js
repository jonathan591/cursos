function adjustFooter() {
    const bodyHeight = document.body.offsetHeight;
    const windowHeight = window.innerHeight;
    const footer = document.getElementById('page-footer');

    if (bodyHeight < windowHeight) {
        // Si el contenido no es suficiente para llenar la ventana, ponemos el footer como absolute
        footer.classList.remove('footer-relative');
        footer.classList.add('footer-absolute');
    } else {
        // Si el contenido es suficiente, mantenemos el footer como relative
        footer.classList.remove('footer-absolute');
        footer.classList.add('footer-relative');
    }
}

// Ejecuta la función cuando la página se carga
window.onload = adjustFooter;



// Función para obtener y mostrar el año actual
function mostrarAnoActual() {
    const hoy = new Date(); // Obtener la fecha actual
    const anio = hoy.getFullYear(); // Obtener solo el año

    // Asignar el año al elemento HTML
    document.getElementById("anio").innerText = anio;
}

// Mostrar el año cuando cargue la página
window.onload = mostrarAnoActual;




// Ejecuta la función cuando la ventana cambia de tamaño
window.onresize = adjustFooter;
var map = L.map('map').setView([-1.9674473, -80.0108424], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 23,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



var marker = L.marker([-1.9674473, -80.0108424]).addTo(map);
marker.bindPopup("<b>Punto Digital Gratuito Petrillo!</b><br>Comuna Petrillo.").openPopup();


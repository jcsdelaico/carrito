
// declarar variables
let btn_sumar = document.querySelectorAll(".btn_sumar");
let btn_restar = document.querySelectorAll(".btn_restar");

// variables const son constantes y no cambian de valor
const FECHA_HOY = "2022-04-29";

// mostrar algo en consola
console.log("saludooo");

// hay que darle funcionalidad a los botones
btn_sumar.forEach(b => {
    b.addEventListener("click", () => {
        // forma estructurada
        // acceder al contenido del tag html
        let id_producto = b.dataset.id_boton;

        // setear la nueva cantidad en el array
        productos[id_producto].cantidad += 1;

        let label = document.querySelector("#cantidad_" + id_producto);
        label.innerText = productos[id_producto].cantidad;

        // forma rápida
        // cantidad1.innerText = cantidad0.innerText + 1;

        calcular_total();
    })

})

btn_restar.forEach(b => {
    b.addEventListener("click", () => {
        //traigo la posicion exacta del elemento en el que estoy
        let id_producto = b.dataset.id_boton;

        // comprobación si es < 0
        if ( productos[id_producto].cantidad == 0 ) return; 

        // setear la nueva cantidad en el array
        productos[id_producto].cantidad -= 1;
        
        //En el html el label tiene el id con su posicopn, entonces lo recreo
        //con la var id_producto que trae tambien la posicion
        let label = document.querySelector("#cantidad_" + id_producto);
        label.innerText = productos[id_producto].cantidad;

        calcular_total();
    })
})


function calcular_total() {
    let cantidad = 0;
    let total = 0;
    $(".div-mostrar-productos").html("");
    productos.forEach(p => {
        //sumo la cantidad de cada producto y la guardo en la var cantidad
        cantidad += p.cantidad; 
        if ( p.cantidad <= 0 ) return;
        mostrarSubtotales(p.nombre, p.cantidad, p.valor);

        total += p.valor * p.cantidad;
    })

    // mostrar u ocultar div totales
    mostrarTotales(total);

    // lleno los span
    document.querySelector(".total-pagar").innerText = "$" + total;
    // lleno los input hidden
    document.querySelector("#tbCantidad").value = cantidad;
    document.querySelector("#tbTotal").value = total;
}

function mostrarSubtotales(nombre, cantidad, valor) {
    $(".div-mostrar-productos").append(`
        <p class='my-0 py-0'>
            ${cantidad + "x " + nombre + " $" + (cantidad * valor)}
        </p>`);
}

function mostrarTotales(total) {
    if ( total > 0 ) $(".div-totales").show();
    if ( total <= 0 ) $(".div-totales").hide();
}



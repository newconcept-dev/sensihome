// Función para cambiar el color de la clase .selectColor
function changeColor(hexColor) {
    const elements = document.querySelectorAll('.selectColor');
    elements.forEach(element => {
        element.style.color = hexColor;
    });
}

// Cambiar el color del icono basado en la selección del usuario
document.getElementById('color_id').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const hexColor = selectedOption.getAttribute('data-hex');
    changeColor(hexColor);
});
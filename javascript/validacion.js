document.addEventListener('DOMContentLoaded', () => {
    // Selecciona inputs y textareas con la clase 'validar-espacios'
    const elementos = document.querySelectorAll('input.validar-espacios, textarea.validar-espacios');

    elementos.forEach(elemento => {
        elemento.addEventListener('input', (e) => {
            // Solo limpia múltiples espacios convirtiéndolos en uno solo
            e.target.value = e.target.value.replace(/\s+/g, ' ');
            
            // Si el valor comienza con espacio, lo elimina
            if (e.target.value.startsWith(' ')) {
                e.target.value = e.target.value.trimStart();
            }
        });
    });

    const form = document.getElementById('miFormulario');
    
    if(form) {
        form.addEventListener('submit', (e) => {
            elementos.forEach(elemento => {
                const valor = elemento.value.trim();
                if (!valor || valor.length === 0) {
                    e.preventDefault();
                    alert(`Por favor complete el campo ${elemento.placeholder || elemento.name}`);
                }
            });
        });
    }
});
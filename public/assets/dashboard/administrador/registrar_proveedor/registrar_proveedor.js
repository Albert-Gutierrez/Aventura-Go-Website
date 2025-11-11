// Variable que controla en qué paso del formulario estamos
let currentStep = 1;

// Función para mostrar un paso específico del formulario
function showStep(step) {
    const steps = document.querySelectorAll('.step-content'); // Todos los pasos de contenido
    const circles = document.querySelectorAll('.step'); // (Si usas círculos/indicadores)

    // Quita la clase 'active' de todos los pasos
    steps.forEach(s => s.classList.remove('active'));
    circles.forEach(c => c.classList.remove('active'));

    // Activa únicamente el paso actual
    document.querySelector(`.step-content[data-step="${step}"]`).classList.add('active');

    // Mostrar u ocultar el botón "Atrás"
    document.getElementById('prevBtn').style.display =
        step === 1 ? 'none' : 'inline-block';

    // Cambia texto del botón siguiente según si es el último paso
    document.getElementById('nextBtn').innerHTML =
        step === 4 ? 'Registrar ✔️' : 'Siguiente ➜';
}

// Controlador del cambio de paso (Siguiente / Anterior)
function changeStep(direction) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    // Si va hacia adelante, primero valida el paso actual
    if (direction === 1 && !validateStep(currentStep)) return;

    currentStep += direction; // Suma o resta 1 al paso

    // Si ya pasó el último paso, pedir confirmación y enviar
    if (currentStep > 4) {

        Swal.fire({
            title: '¿Confirmar registro?',
            text: "Se guardará la información del proveedor.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, registrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            // Solo envía el formulario si el usuario confirma
            if (result.isConfirmed) {
                document.getElementById("formProveedor").submit();
            }
        });

        return;
    }

    // Si ingresó al último paso, carga vista previa
    if (currentStep === 4) loadPreview();

    // Mostrar paso actual
    showStep(currentStep);
}

// Validación básica: verifica que los campos requeridos no estén vacíos
function validateStep(step) {
    const stepContent = document.querySelector(`.step-content[data-step="${step}"]`);
    const inputs = stepContent.querySelectorAll("input[required], select[required], textarea[required]");

    for (let input of inputs) {
        // Si el campo está vacío, marca error y detiene el avance
        if (!input.value.trim()) {
            input.classList.add("is-invalid");
            input.focus();
            return false;
        } else {
            input.classList.remove("is-invalid");
        }
    }

    return true; // Si todo OK, puede continuar
}

// Carga datos en la vista previa del último paso
function loadPreview() {
    // Datos generales
    document.getElementById('prev-empresa').textContent = empresa.value;
    document.getElementById('prev-nit').textContent = nit.value;
    document.getElementById('prev-representante').textContent = representante.value;
    document.getElementById('prev-email').textContent = email.value;

    // Actividades seleccionadas (checkboxes)
    let actividades = [];
    document.querySelectorAll('input[name="actividades[]"]:checked')
        .forEach(el => actividades.push(el.value));

    document.getElementById('prev-actividades').textContent =
        actividades.join(", ") || "-";

    // Otros datos
    document.getElementById('prev-capacidad').textContent = capacidad.value;
    document.getElementById('prev-ubicacion').textContent = `${ciudad.value}, ${departamento.value}`;
    document.getElementById('prev-descripcion').textContent = descripcion.value || "-";
    document.getElementById('prev-cobertura').textContent = cobertura.value || "-";
}

// Inicializa el formulario mostrando el paso 1
showStep(currentStep);

// Mensaje cuando el usuario confirma datos en el último paso
document.getElementById("confirmarDatosBtn").addEventListener("click", function () {
    Swal.fire({
        icon: 'success',
        title: 'Datos Confirmados',
        text: 'Ahora haz clic en "Registrar" para guardar la información.',
        confirmButtonText: 'Entendido'
    });
});

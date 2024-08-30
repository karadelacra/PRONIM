$(document).ready(function () {
    $("#registroForm").submit(function (event) {
      // Limpia todas las advertencias existentes
      $(".text-danger").remove();

      // Realiza las validaciones para cada campo
      validateField("cyn", /^[a-zA-Z0-9\s]+$/ , "El formato de la calle no es válido.");
      validateField("colonia", /^[a-zA-Z0-9\s]+$/ , "El formato de la colonia no es válido.");
      validateField("cp", /^\d{5}$/, "El formato del Código Postal no es válido.");
      validateField("noBoleta", /^(PE|PP)?\d{8}$|(?!.*\d{11})\d{10}$/, "El formato de la boleta no es válido.");
      validateField("nombre", /^[a-zA-Z\s]+$/, "El formato del nombre no es válido.");
      validateField("apellidoPaterno", /^[a-zA-Z]+$/, "El formato del apellido paterno no es válido.");
      validateField("apellidoMaterno", /^[a-zA-Z]+$/, "El formato del apellido materno no es válido.");
      validateField("telefono", /^\d{10}$/, "El formato del teléfono no es válido.");
      validateField("curp", /^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}[\d\w]{2}$/, "El formato del CURP no es válido.");
      validateField("entidadProcedencia", /^(?!$)/, "Por favor, selecciona una entidad de procedencia.");

      // Verifica si hubo alguna validación fallida
      if ($(".text-danger").length > 0) {
        // Si hubo al menos una validación fallida, evita que el formulario se envíe
        event.preventDefault();
      }
    });

    // Función para validar un campo y mostrar la advertencia si es necesario
    function validateField(fieldName, regex, errorMessage) {
      const fieldValue = $("#" + fieldName).val();
      if (!regex.test(fieldValue)) {
        $("#" + fieldName).after('<div class="text-danger">' + errorMessage + '</div>');
      }
    }
  });


  function limpiarFormulario() {
      
    var form = document.getElementById("registroForm");
    form.reset();

    // Oculta el campo de tipo de discapacidad
    document.getElementById("tipoDiscapacidadContainer").style.display = "none";
    document.getElementById("otraDiscapacidadContainer").style.display = "none";
}

//limpiar el formulario con el click
document.querySelector('button[type="button"]').addEventListener("click", limpiarFormulario);


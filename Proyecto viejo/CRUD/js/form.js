
                    $(document).ready(function () {
                          // Evento de escucha para el cambio del select "escuelaProcedencia"
                          $("#escuelaProcedencia").change(function () {
                              // Limpiar el contenido de los campos de texto si la opción no es "otro"
                              if ($(this).val() !== "otro") {
                                  $("#nombreEscuela").val("");  // Limpiar el contenido del campo "nombreEscuela"
                              }
              
                              // Verifica si la opción seleccionada es "otro"
                              if ($(this).val() === "otro") {
                                  // Muestra todo el div "Escuelita" si la opción es "otro"
                                  $("#Escuelita").show();
                              } else {
                                  // Oculta todo el div "Escuelita" y limpia el campo si la opción no es "otro"
                                  $("#Escuelita").hide();
                              }
                          });
              
                          // Evento de escucha para el cambio del checkbox "tieneDiscapacidad"
                          $("#tieneDiscapacidad").change(function () {
                              if ($(this).is(":checked")) {
                                  $("#tipoDiscapacidadContainer").show();
                              } else {
                                  $("#tipoDiscapacidadContainer").hide();
                              }
                          });
              
                          // Evento de escucha para el cambio del select "tipoDiscapacidad"
                          $("#tipoDiscapacidad").change(function () {
                              // Limpiar el contenido del campo de texto "otraDiscapacidad" si la opción no es "otra"
                              if ($(this).val() !== "") {
                                  $("#otraDiscapacidad").val("");  // Limpiar el contenido del campo "otraDiscapacidad"
                              }
              
                              // Verifica si la opción seleccionada es "otra"
                              if ($(this).val() === "") {
                                  // Muestra el div "Otra discapacidad" si la opción es "otra"
                                  $("#otraDiscapacidadContainer").show();
                              } else {
                                  // Oculta el div "Otra discapacidad" y limpia el campo si la opción no es "otra"
                                  $("#otraDiscapacidadContainer").hide();
                              }
                          });
                      });
              
              
                  // Obtén referencias a los elementos del DOM
                  const checkbox = document.getElementById('tieneDiscapacidad');
                  const selectDiscapacidad = document.getElementById('tipoDiscapacidad');
                  const inputOtraDiscapacidad = document.getElementById('otraDiscapacidad');
              
                  // Agrega un event listener al checkbox
                  checkbox.addEventListener('change', function() {
                    // Si el checkbox está desmarcado, borra los valores en el select y el input
                    if (!checkbox.checked) {
                      selectDiscapacidad.value = '-';
                      inputOtraDiscapacidad.value = '-';
                    }
                  });
INFORMACION DEL PROYECTO:
_________________________________________________________________________________________

▶️ ¿Qué hace?

Este proyecto es una aplicación web desarrollada con Laravel 12 que simula un gestor de actividades extraescolares en un entorno escolar. Su principal funcionalidad es permitir la gestión completa de actividades, registro de alumnos y la asignación de inscripciones entre ambos.

Las funcionalidades principales del sistema incluyen:

 - Administración de actividades: Alta, edición, eliminación y visualización de actividades extraescolares indicando nombre, descripción, día de la semana, hora de inicio y hora de finalización.
<p align="center">
<img width="400" height="400" alt="image" src="https://github.com/user-attachments/assets/cc97baee-28cf-4604-9994-0513ba0a3f72" />
</p>


 - Gestión de alumnos: Alta, edición, eliminación y visualización de alumnos con sus datos (nombre completo, curso y edad).
<p align="center">
<img width="400" height="400" alt="image" src="https://github.com/user-attachments/assets/058ed4a7-1b57-4944-893e-4e5f808618ee" />
</p>

 - Inscripción de alumnos en actividades: Alta, eliminación y visualización de inscripciones, que permitirán relacionar a los alumnos con una o varias actividades, hemos implementado un campo extra que nos permitirá saber el estado actual de la inscripción (pendiente, aceptada, cancelada), por consiguiente tambien permitimos la edición de dicho estado, pero no de la relación creada.
<p align="center">
<img width="400" height="400" alt="image" src="https://github.com/user-attachments/assets/6a64bb3f-e99e-4c75-848c-d36cf3ebf695" />
</p>

 - Visualización en vistas Blade con Bootstrap: Toda la información se presenta en una interfaz web amigable y responsive.
<table>
  <tr>
    <td>
<img width="959" height="648" alt="image" src="https://github.com/user-attachments/assets/ae0b6827-9dd4-4e76-8d2b-ad49936f0890" />
      </td><td>
<img width="1149" height="528" alt="image" src="https://github.com/user-attachments/assets/d3b876a4-ad7b-4260-934e-0a0c96399fd3" />
        </td><td>
<img width="947" height="709" alt="image" src="https://github.com/user-attachments/assets/834d0c2f-e5c8-4309-afda-9105e3733ca2" />
          </td>
    </tr>
</table>

 - API pública: Se expone una ruta API (/api/actividades) para consultar todas las actividades en formato JSON.
   <p align="center">
   <img width="400" height="500" alt="image" src="https://github.com/user-attachments/assets/ad8d61c1-78a4-424e-b5f4-11f4ca2ee62c" />
   </p>
 - Validaciones y seguridad de datos: Se implementan validaciones para asegurar que los datos introducidos son correctos antes de ser guardados.

<table>
  <tr>
    <td>
<img width="947" height="677" alt="image" src="https://github.com/user-attachments/assets/b9c1ade1-4437-4498-a339-b2cfb42a1b81" />
      </td><td>
<img width="947" height="474" alt="image" src="https://github.com/user-attachments/assets/8eaac2b8-4166-45b6-bad1-b1e7ccb5a826" />
      </td>
  </tr>
</table>

 - Exportación a PDF: Posibilidad de exportar un listado de inscripciones por actividad.
   <p align="center">
   <img width="400" height="500" alt="image" src="https://github.com/user-attachments/assets/8ddbed90-f1ee-4765-a329-611ff32c5f4d" />

  
 - Barra de búsqueda: Para facilitar el filtrado de actividades por nombre.
 <p align="center">
<img width="600" height="400" alt="image" src="https://github.com/user-attachments/assets/50ddc36f-211d-4d6f-8c3c-ecf61e0abfd9" />
    </p> <p align="center">
<img width="600" height="400" alt="image" src="https://github.com/user-attachments/assets/80dec0dd-be37-4fc7-a176-6603b6e06d04" />
       </p> <p align="center">
<img width="600" height="400" alt="image" src="https://github.com/user-attachments/assets/87786777-e7e9-44d8-a7c0-d7e12740418d" />
  </p>

<hr>

▶️ ¿Cómo lo hiciste?

Hoja de Ruta del Proyecto "<b><i>Gestor de Actividades Escolares</i></b>":
<pre>
 1. Configuración del entorno.
  2. Crear modelos y migraciones.
   3. Configurar relaciones en los modelos.
    4. Crear controladores tipo resource.
     5. Definir rutas en web.php.
      6. Creación de seeders y factories.
       7. Diseño de vistas layouts Blade + Bootstrap
        8. Crear vistas Blade (de visualización y formularios).
         9. Asegurar coherencia visual en todas las vistas.
          10. Validación de entrada de datos mediante request.
           11. Crear y comprobar funcionamiento de mensajes de éxito/error.
            12. Genear estructura API ( Controlador API y ruta api.php)
             13. Exportación de listados en pdf.
              14. Crear formulario de busqueda.
               15. Probar cada flujo (crear, visualizar, editar, eliminar).
                16. Pruebas funcionales y revisión.
</pre>
Tecnologías utilizadas:

Mapa topológico:
<img width="1010" height="872" alt="image" src="https://github.com/user-attachments/assets/5eb2e9c3-7fd2-49ec-8703-23fdbc1114b7" />














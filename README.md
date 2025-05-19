# Manejo de Facturas Web

[![](https://img.shields.io/badge/Version-1.0-green)]()

Aplicacion web desarollada para manejar registrod de facturas, agregar, eliminar y leer registros junto con la generacion de reportes automatizada.

## Instalacion

- Solo Clona el Repositorio:

```bash
git clone https://github.com/MyDiDev/Facturas-Managament-Web.git
```

Ve al Directorio Generado y Abrelo en tu Editor preferido.

```bash
cd Facturas-Managament-Web
```

## Y Ejecuta la Aplicacion

- Para este paso debe tener instalado xampp en tu maquina.

## Contribucion

- Haz un **Fork** del Repositorio

- **Clona** tu Fork:
  ```bash
  git clone https://github.com/MyDiDev/Facturas-Managament-Web.git
  ```
- **Crea** una nueva Rama:
  ```bash
  git checkout -b feature/nombre-feature
  ```
- **Haz tus Cambios** y el Commit:
  ```bash
  git commit -m "commit"
  ```
- **Push al fork**:
  ```bash
  git push origin feature/nombre-feature
  ```
- **Abre un pull request** y describelo.

## Documentacion

Claro, puedo ayudarte a crear una documentación básica para utilizar la librería DOMPDF en PHP. DOMPDF es una herramienta que permite convertir contenido HTML a archivos PDF, facilitando la generación de documentos como facturas, reportes o cualquier otro tipo de contenido que se desee exportar en formato PDF.

---

## 📄 Guía Rápida para Usar DOMPDF en PHP

### 1. Instalación

#### Usando Composer (recomendado)

Si tu proyecto utiliza Composer, puedes instalar DOMPDF ejecutando el siguiente comando en la raíz de tu proyecto:

```bash
composer require dompdf/dompdf
```

Luego, incluye el autoloader de Composer al inicio de tu script PHP:

```php
require 'vendor/autoload.php';
```

#### Instalación manual

Si prefieres no usar Composer, puedes descargar la librería desde su [repositorio oficial en GitHub](https://github.com/dompdf/dompdf) y seguir las instrucciones de instalación manual.

---

### 2. Uso Básico

A continuación, se muestra un ejemplo básico de cómo generar un archivo PDF a partir de contenido HTML:

```php
<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Configuración de opciones
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

$html = '<html><body><h1>Hola, Mundo!</h1><p>Este es un PDF generado con DOMPDF.</p></body></html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('documento.pdf');
?>
```

Este script generará un archivo PDF con el contenido HTML especificado y lo enviará al navegador para su descarga.

---

### 3. Funcionalidades Avanzadas

- **Establecer fuente por defecto**: Puedes configurar la fuente predeterminada del PDF utilizando el siguiente código:

```php
  $dompdf->set_option('defaultFont', 'Courier');
```

- **Obtener dimensiones del documento**: Para obtener el ancho y alto del documento generado:

```php
  $width = $dompdf->get_width();
  $height = $dompdf->get_height();
```

- **Mostrar PDF en el navegador**: Para mostrar el PDF directamente en el navegador sin forzar la descarga:

```php
  $dompdf->stream('documento.pdf', array('Attachment' => false));
```

- **Guardar PDF en el servidor**: Para guardar el PDF generado en el servidor:

```php
  $output = $dompdf->output();
  file_put_contents('ruta/del/archivo.pdf', $output);
```

---

### 4. Requisitos y Limitaciones

- DOMPDF requiere PHP 5.3 o superior.
- Es compatible con HTML 4.01 y CSS 2.1.
- No soporta JavaScript ni formularios interactivos.
- Se recomienda tener habilitada la extensión `mbstring` de PHP para un mejor manejo de caracteres multibyte.

---

### 5. Recursos Adicionales

- [Repositorio oficial en GitHub](https://github.com/dompdf/dompdf)
- [Documentación oficial](https://github.com/dompdf/dompdf/wiki)
- [Tutorial en Styde.net sobre Laravel y DOMPDF](https://styde.net/generar-pdf-en-laravel-5-1-con-dompdf/)

## Authores

- [@MyDiDev](https://www.github.com/MyDiDev)

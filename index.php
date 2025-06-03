<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/styles.css">
  <title>Formulario de Productos</title>
</head>

<body>
  <!-- <?php
  echo "hola php";
  ?> -->

  <form>
    <label for="code">Código:</label>
    <input type="text" id="code" name="code" />

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" />

    <label for="store">Bodega:</label>
    <select id="store" name="store">
      <option value=""></option>
      <option value="store1">Bodega 1</option>
      <option value="store99">Bodega 2</option>
    </select>

    <label for="office">Sucursal:</label>
    <select id="office" name="office">
      <option value=""></option>
      <option value="office1">Sucursal 1</option>
      <option value="office99">Sucursal 2</option>
    </select>

    <label for="currency">Moneda:</label>
    <select id="currency" name="currency">
      <option value=""></option>
      <option value="CLP">CLP</option>
      <option value="USD">USD</option>
      <option value="EUR">EUR</option>
    </select>

    <label for="price">Precio:</label>
    <input type="text" id="price" name="price" />

    <fieldset>
      <legend>Material del Producto:</legend>

      <input type="checkbox" id="material1" name="material" value="plastic" />
      <label for="material1">Plástico</label>

      <input type="checkbox" id="material2" name="material" value="metal" />
      <label for="material2">Metal</label>

      <input type="checkbox" id="material3" name="material" value="wood" />
      <label for="material3">Madera</label>

      <input type="checkbox" id="material4" name="material" value="glass" />
      <label for="material4">Vidrio</label>

      <input type="checkbox" id="material5" name="material" value="textile" />
      <label for="material5">Textil</label>
    </fieldset>

    <label for="description">Descripción del Producto:</label>
    <textarea id="description" name="description" rows="4"></textarea>

    <button type="submit" id="save-button">Guardar Producto</button>
  </form>

</body>

</html>
<!DOCTYPE html>
<html>
<?php include 'database/db.php' ?>

<head>
  <link rel="stylesheet" href="css/styles.css">
  <title>Formulario de Productos</title>
</head>

<body>
  <form>
    <h1>Formulario de Producto</h1>
    <div class="row">
      <div class="input-group">
        <label for="code">Código:</label>
        <input type="text" id="code" name="code" />
      </div>

      <div class="input-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" />
      </div>
    </div>

    <div class="row">
      <div class="input-group">
        <label for="store">Bodega:</label>
        <select id="store" name="store">
          <option value=""></option>
          <option value="store1">Bodega 1</option>
          <option value="store99">Bodega 2</option>
        </select>
      </div>
      <div class="input-group">
        // todo cargan con AJAX async al seleccionar bodega
        <label for="office">Sucursal:</label>
        <select id="office" name="office">
          <option value=""></option>
          <option value="office1">Sucursal 1</option>
          <option value="office99">Sucursal 2</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="input-group">
        <label for="currency">Moneda:</label>
        <select id="currency" name="currency">
          <option value=""></option>
          <option value="CLP">CLP</option>
          <option value="USD">USD</option>
          <option value="EUR">EUR</option>
        </select>
      </div>

      <div class="input-group">
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" />
      </div>
    </div>

    <div class="row">
      <div class="input-group">
        <label>Material del Producto:</label>
        <div class="checkbox-group">
          <div class="checkbox-item">
            <input type="checkbox" id="material1" name="material" value="plastic" />
            <label for="material1">Plástico</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material2" name="material" value="metal" />
            <label for="material2">Metal</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material3" name="material" value="wood" />
            <label for="material3">Madera</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material4" name="material" value="glass" />
            <label for="material4">Vidrio</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material5" name="material" value="textile" />
            <label for="material5">Textil</label>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="input-group">
        <label for="description">Descripción:</label>
        <textarea id="description" name="description"></textarea>
      </div>
    </div>

    <button type="submit" class="submit">Guardar Producto</button>
  </form>
</body>

</html>
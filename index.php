<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/styles.css">
  <title>Formulario de Productos</title>
</head>
<script>
  document.addEventListener('DOMContentLoaded', async () => {
    // todo -> loading curreny
    try {
      const response = await fetch('php/controllers/index.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'get_monedas=true',
      });
      const { success, data } = await response.json();
      const isArray = Array.isArray(data);
      if (!success || !isArray) return;

      const select = document.getElementById('currency');
      select.innerHTML = '';
      select.appendChild(new Option('', ''));

      data.map(({ id, nombre }) => select.appendChild(new Option(nombre, id)))
    } catch (error) {
      console.error('Error:', error);
    }
    // todo -> loading store 
    try {
      const response = await fetch('php/controllers/index.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'get_bodegas=true',
      });
      const { success, data } = await response.json();
      const isArray = Array.isArray(data);
      if (!success || !isArray) return;

      const select = document.getElementById('store');
      select.innerHTML = '';
      select.appendChild(new Option('', ''));

      data.map(({ id, nombre }) => select.appendChild(new Option(nombre, id)))
    } catch (error) {
      console.error('Error:', error);
    }
    // todo -> loading office
    const bodegaSelected = document.getElementById('store');
    const sucursalSelected = document.getElementById('office');

    setPlaceholder(sucursalSelected, 'Selecciona Bodega...');
    bodegaSelected.addEventListener('change', async ({ target: { value: bodegaId } }) => {
      if (!bodegaId) {
        setPlaceholder(sucursalSelected, 'Selecciona Bodega...');
        return;
      }
      if (!validateIsNumber(bodegaId)) return;
      setPlaceholder(sucursalSelected, 'Cargando...');

      try {
        const response = await fetch('php/controllers/index.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `get_sucursales=true&bodega_id=${encodeURIComponent(bodegaId)}`,
        });

        const { success, data } = await response.json();
        const isArray = Array.isArray(data);
        if (!success || !isArray) return;

        setFirstEmpty(sucursalSelected);
        data.map(({ id, nombre }) => sucursalSelected.appendChild(new Option(nombre, id)))
        sucursalSelected.disabled = false;

      } catch (error) {
        console.error('Error:', error);
      }
    });
    // todo -> sending form
    const form = document.querySelector('form');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);
      const isValidForm = validationForm(formData)
      if (!isValidForm) return;
      formData.append('insert_producto', 'true');
      try {
        const response = await fetch('php/controllers/index.php', {
          method: 'POST',
          body: new URLSearchParams(formData),
        });

        const result = await response.json();
        console.log('Resultado insert:', result);
        const success = result.success && result.id;

        if (success) {
          alert('Producto creado correctamente!');
          form.reset();
        }
      } catch (error) {
        console.error('Error:', error);
      }
    });
  });
</script>

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
        </select>
      </div>
      <div class="input-group">
        <!-- // todo cargan con AJAX async al seleccionar bodega -->
        <label for="office">Sucursal:</label>
        <select id="office" name="office">

        </select>
      </div>
    </div>

    <div class="row">
      <div class="input-group">
        <label for="currency">Moneda:</label>
        <select id="currency" name="currency">
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
            <input type="checkbox" id="material1" name="material[]" value="plastic" />
            <label for="material1">Plástico</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material2" name="material[]" value="metal" />
            <label for="material2">Metal</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material3" name="material[]" value="wood" />
            <label for="material3">Madera</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material4" name="material[]" value="glass" />
            <label for="material4">Vidrio</label>
          </div>

          <div class="checkbox-item">
            <input type="checkbox" id="material5" name="material[]" value="textile" />
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
  <script src="js/main.js"></script>
  <script src="js/helper.js"></script>
</body>

</html>
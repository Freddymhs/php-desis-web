// todo -> funciones javascript
const validationForm = (formData) => {
  // todo -> Validar código del producto
  const code = formData.get("code")?.trim();
  if (!code) {
    alert("El código del producto no puede estar en blanco.");
    return false;
  }

  const regexCode = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,15}$/;
  if (!regexCode.test(code)) {
    if (code.length < 5 || code.length > 15) {
      alert("El código del producto debe tener entre 5 y 15 caracteres.");
    } else {
      alert("El código del producto debe contener letras y números");
    }
    return false;
  }

  // todo -> Validar nombre del producto
  const name = formData.get("name")?.trim();
  if (!name) {
    alert("El nombre del producto no puede estar en blanco.");
    return false;
  }

  if (name.length < 2 || name.length > 50) {
    alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
    return false;
  }

  // todo -> Validar precio del producto
  const price = formData.get("price")?.trim();
  if (!price) {
    alert("El precio del producto no puede estar en blanco.");
    return false;
  }

  const regexPrice = /^\d+(\.\d{1,2})?$/;
  if (!regexPrice.test(price) || parseFloat(price) <= 0) {
    alert(
      "El precio del producto debe ser un número positivo con hasta dos decimales."
    );
    return false;
  }

  // todo -> Validar materiales (min 2)
  const selectedMaterials = formData.getAll("material[]");
  if (selectedMaterials.length < 2) {
    alert("Debe seleccionar al menos dos materiales para el producto.");
    return false;
  }

  // todo -> Validar bodega
  const storage = formData.get("store")?.trim();
  if (!storage) {
    alert("Debe seleccionar una bodega.");
    return false;
  }

  // todo -> Validar sucursal (requerida cuando hay bodega)
  const office = formData.get("office")?.trim();
  if (storage && !office) {
    alert("Debe seleccionar una sucursal para la bodega seleccionada.");
    return false;
  }

  // todo ->  Validar moneda
  const currency = formData.get("currency")?.trim();
  if (!currency) {
    alert("Debe seleccionar una moneda para el producto.");
    return false;
  }

  // todo ->  Validar descripción
  const description = formData.get("description")?.trim();
  if (!description) {
    alert("La descripción del producto no puede estar en blanco.");
    return false;
  }

  if (description.length < 10 || description.length > 1000) {
    alert("La descripción del producto debe tener entre 10 y 1000 caracteres.");
    return false;
  }
  // todo -> notifica resultado
  return true;
};

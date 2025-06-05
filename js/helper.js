const setPlaceholder = (select, text) => {
  select.innerHTML = `<option value="">${text}</option>`;
  select.disabled = true;
};
const setFirstEmpty = (select) => {
  select.innerHTML = "";
  select.appendChild(new Option("", ""));
};
const validateIsNumber = (value) => {
  const regex = /^[0-9]+$/;
  return regex.test(value);
};

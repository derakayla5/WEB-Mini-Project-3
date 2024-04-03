document.addEventListener("DOMContentLoaded", function () {
  const quantityInput = document.getElementById("quantity");
  const btnMinus = document.getElementById("btn-minus");
  const btnPlus = document.getElementById("btn-plus");

  btnMinus.addEventListener("click", function () {
    decreaseQuantity();
  });

  btnPlus.addEventListener("click", function () {
    increaseQuantity();
  });

  function decreaseQuantity() {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
    }
  }

  function increaseQuantity() {
    let currentValue = parseInt(quantityInput.value);
    let maxValue = parseInt(quantityInput.getAttribute("max"));
    if (currentValue < maxValue) {
      quantityInput.value = currentValue + 1;
    }
  }
});
